<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\Arlicons\BladeArliconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Orchestra\Testbench\TestCase;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('arlicons-arl-triangle')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 382.4 300.6" stroke="currentColor" >
                <g>
                    <polygon points="300.7,0 0,0 0,300.6 	"/>
                </g>
            </svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('arlicons-arl-triangle', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 382.4 300.6" stroke="currentColor" >
                <g>
                    <polygon points="300.7,0 0,0 0,300.6 	"/>
                </g>
            </svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('arlicons-arl-triangle', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 382.4 300.6" stroke="currentColor" >
                <g>
                    <polygon points="300.7,0 0,0 0,300.6 	"/>
                </g>
            </svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeArliconsServiceProvider::class,
        ];
    }
}
