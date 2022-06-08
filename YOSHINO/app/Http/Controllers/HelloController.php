<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        return <<<EOF
        <html>
        <head>
        <title>Hello</title>
        <style>
        body { font-size:16pt; color:#999; }
        h1 { font-size: 100pt; text-align:right; color:#eee; }
        </style>
        </head>
        <body> 
            <h1>Index</h1>
            <p>これは、Helloコントローラのindexアクションです。</p>
        </body>
        </html>
        EOF;
    }
}
