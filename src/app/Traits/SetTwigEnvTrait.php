<?php

namespace App\Traits;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Extra\Markdown\DefaultMarkdown;
use Twig\Extra\Markdown\MarkdownExtension;
use Twig\Extra\Markdown\MarkdownRuntime;
use Twig\Loader\FilesystemLoader;
use Twig\RuntimeLoader\RuntimeLoaderInterface;

trait SetTwigEnvTrait
{
    public function setTwigEnv(): Environment
    {
        $loader = new FilesystemLoader('../templates/');
        $twig = new Environment($loader, ['debug' => true]);
        $twig->addExtension(new DebugExtension());
        $twig = new Environment($loader);
        $twig->addExtension(new MarkdownExtension());
        $twig->addRuntimeLoader(new class implements RuntimeLoaderInterface {
            public function load($class)
            {
                if (MarkdownRuntime::class === $class) {
                    return new MarkdownRuntime(new DefaultMarkdown());
                }
                return null;
            }
        });
        return $twig;
    }
}