<?php declare(strict_types=1);

namespace Amp\Internal;

/**
 * Formats a stacktrace obtained via `debug_backtrace()`.
 *
 * @param list<array{
 *     args?:list<mixed>,
 *     class?: class-string,
 *     file?: string,
 *     function: string,
 *     line?: int,
 *     object?: object,
 *     type?: string,
 * }> $trace
 * Output of `debug_backtrace()`.
 *
 * @return string Formatted stacktrace.
 *
 * @codeCoverageIgnore
 * @internal
 */
function formatStacktrace(array $trace): string
{
    return \implode("\n", \array_map(static function (array $e, int $i): string {
        $line = "#{$i} ";

        if (isset($e["file"], $e['line'])) {
            $line .= "{$e['file']}:{$e['line']} ";
        }

        if (isset($e["class"], $e["type"])) {
            $line .= $e["class"] . $e["type"];
        }

        return $line . $e["function"] . "()";
    }, $trace, \array_keys($trace)));
}

/**
 * @return bool True if AMP_DEBUG is set to a truthy value.
 * @internal
 */
function isDebugEnabled(): bool
{
    /** @psalm-suppress RiskyTruthyFalsyComparison */
    $env = \getenv("AMP_DEBUG") ?: "0";
    return match ($env) {
        "0", "false", "off" => false,
        default => $env || \defined("AMP_DEBUG") && \AMP_DEBUG,
    };
}
