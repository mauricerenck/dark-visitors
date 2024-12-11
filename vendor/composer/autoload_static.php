<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit245ce61f8c23cb530830ad874720877c
{
    public static $files = array (
        '88254829cb0eed057c30eaabb6d8edc4' => __DIR__ . '/..' . '/amphp/amp/src/functions.php',
        '429ae5f14a13a9076791c19422e10996' => __DIR__ . '/..' . '/amphp/amp/src/Future/functions.php',
        'c8601a4144b50a7b548da082c89c4dc1' => __DIR__ . '/..' . '/amphp/amp/src/Internal/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mauricerenck\\DarkVisitors\\' => 26,
        ),
        'R' => 
        array (
            'Revolt\\' => 7,
        ),
        'K' => 
        array (
            'Kirby\\' => 6,
        ),
        'A' => 
        array (
            'Amp\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mauricerenck\\DarkVisitors\\' => 
        array (
            0 => __DIR__ . '/../..' . '/plugin',
        ),
        'Revolt\\' => 
        array (
            0 => __DIR__ . '/..' . '/revolt/event-loop/src',
        ),
        'Kirby\\' => 
        array (
            0 => __DIR__ . '/..' . '/getkirby/composer-installer/src',
        ),
        'Amp\\' => 
        array (
            0 => __DIR__ . '/..' . '/amphp/amp/src',
        ),
    );

    public static $classMap = array (
        'Amp\\Cancellation' => __DIR__ . '/..' . '/amphp/amp/src/Cancellation.php',
        'Amp\\CancelledException' => __DIR__ . '/..' . '/amphp/amp/src/CancelledException.php',
        'Amp\\Closable' => __DIR__ . '/..' . '/amphp/amp/src/Closable.php',
        'Amp\\CompositeCancellation' => __DIR__ . '/..' . '/amphp/amp/src/CompositeCancellation.php',
        'Amp\\CompositeException' => __DIR__ . '/..' . '/amphp/amp/src/CompositeException.php',
        'Amp\\CompositeLengthException' => __DIR__ . '/..' . '/amphp/amp/src/CompositeLengthException.php',
        'Amp\\DeferredCancellation' => __DIR__ . '/..' . '/amphp/amp/src/DeferredCancellation.php',
        'Amp\\DeferredFuture' => __DIR__ . '/..' . '/amphp/amp/src/DeferredFuture.php',
        'Amp\\ForbidCloning' => __DIR__ . '/..' . '/amphp/amp/src/ForbidCloning.php',
        'Amp\\ForbidSerialization' => __DIR__ . '/..' . '/amphp/amp/src/ForbidSerialization.php',
        'Amp\\Future' => __DIR__ . '/..' . '/amphp/amp/src/Future.php',
        'Amp\\Future\\UnhandledFutureError' => __DIR__ . '/..' . '/amphp/amp/src/Future/UnhandledFutureError.php',
        'Amp\\Internal\\Cancellable' => __DIR__ . '/..' . '/amphp/amp/src/Internal/Cancellable.php',
        'Amp\\Internal\\FutureIterator' => __DIR__ . '/..' . '/amphp/amp/src/Internal/FutureIterator.php',
        'Amp\\Internal\\FutureIteratorQueue' => __DIR__ . '/..' . '/amphp/amp/src/Internal/FutureIteratorQueue.php',
        'Amp\\Internal\\FutureState' => __DIR__ . '/..' . '/amphp/amp/src/Internal/FutureState.php',
        'Amp\\Internal\\WrappedCancellation' => __DIR__ . '/..' . '/amphp/amp/src/Internal/WrappedCancellation.php',
        'Amp\\NullCancellation' => __DIR__ . '/..' . '/amphp/amp/src/NullCancellation.php',
        'Amp\\SignalCancellation' => __DIR__ . '/..' . '/amphp/amp/src/SignalCancellation.php',
        'Amp\\SignalException' => __DIR__ . '/..' . '/amphp/amp/src/SignalException.php',
        'Amp\\TimeoutCancellation' => __DIR__ . '/..' . '/amphp/amp/src/TimeoutCancellation.php',
        'Amp\\TimeoutException' => __DIR__ . '/..' . '/amphp/amp/src/TimeoutException.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Kirby\\ComposerInstaller\\CmsInstaller' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/CmsInstaller.php',
        'Kirby\\ComposerInstaller\\Installer' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/Installer.php',
        'Kirby\\ComposerInstaller\\Plugin' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/Plugin.php',
        'Kirby\\ComposerInstaller\\PluginInstaller' => __DIR__ . '/..' . '/getkirby/composer-installer/src/ComposerInstaller/PluginInstaller.php',
        'Revolt\\EventLoop' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop.php',
        'Revolt\\EventLoop\\CallbackType' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/CallbackType.php',
        'Revolt\\EventLoop\\Driver' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Driver.php',
        'Revolt\\EventLoop\\DriverFactory' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/DriverFactory.php',
        'Revolt\\EventLoop\\Driver\\EvDriver' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Driver/EvDriver.php',
        'Revolt\\EventLoop\\Driver\\EventDriver' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Driver/EventDriver.php',
        'Revolt\\EventLoop\\Driver\\StreamSelectDriver' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Driver/StreamSelectDriver.php',
        'Revolt\\EventLoop\\Driver\\TracingDriver' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Driver/TracingDriver.php',
        'Revolt\\EventLoop\\Driver\\UvDriver' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Driver/UvDriver.php',
        'Revolt\\EventLoop\\FiberLocal' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/FiberLocal.php',
        'Revolt\\EventLoop\\Internal\\AbstractDriver' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/AbstractDriver.php',
        'Revolt\\EventLoop\\Internal\\ClosureHelper' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/ClosureHelper.php',
        'Revolt\\EventLoop\\Internal\\DeferCallback' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/DeferCallback.php',
        'Revolt\\EventLoop\\Internal\\DriverCallback' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/DriverCallback.php',
        'Revolt\\EventLoop\\Internal\\DriverSuspension' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/DriverSuspension.php',
        'Revolt\\EventLoop\\Internal\\SignalCallback' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/SignalCallback.php',
        'Revolt\\EventLoop\\Internal\\StreamCallback' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/StreamCallback.php',
        'Revolt\\EventLoop\\Internal\\StreamReadableCallback' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/StreamReadableCallback.php',
        'Revolt\\EventLoop\\Internal\\StreamWritableCallback' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/StreamWritableCallback.php',
        'Revolt\\EventLoop\\Internal\\TimerCallback' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/TimerCallback.php',
        'Revolt\\EventLoop\\Internal\\TimerQueue' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Internal/TimerQueue.php',
        'Revolt\\EventLoop\\InvalidCallbackError' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/InvalidCallbackError.php',
        'Revolt\\EventLoop\\Suspension' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/Suspension.php',
        'Revolt\\EventLoop\\UncaughtThrowable' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/UncaughtThrowable.php',
        'Revolt\\EventLoop\\UnsupportedFeatureException' => __DIR__ . '/..' . '/revolt/event-loop/src/EventLoop/UnsupportedFeatureException.php',
        'mauricerenck\\DarkVisitors\\Api' => __DIR__ . '/../..' . '/plugin/Api.php',
        'mauricerenck\\DarkVisitors\\Config' => __DIR__ . '/../..' . '/plugin/Config.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit245ce61f8c23cb530830ad874720877c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit245ce61f8c23cb530830ad874720877c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit245ce61f8c23cb530830ad874720877c::$classMap;

        }, null, ClassLoader::class);
    }
}