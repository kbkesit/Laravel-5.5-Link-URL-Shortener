<?php

namespace ahref\Http\Controllers;

use Illuminate\Http\Request;
use ahref\Link;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    public function visit($url)
    {
        $long_link = Link::find($url);
        if (empty($long_link))
        {
            return view('errors.404');
        }
        $clicks = $long_link->clicks;
        $clicks += 1;
        $long_link->clicks = $clicks;
        $long_link->save();

        return redirect()->away((is_null(parse_url($long_link->long_url, PHP_URL_HOST)) ? '//' : '').$long_link->long_url);
    }

    public function shorten(Request $request)
    {
        $this->validate($request, [
            'long_url' => 'required',
        ]);

        while (true) {
            $short_url = $this->randomURL(3);
            $short_link = Link::find($short_url);
            if (empty($short_link))
            {
                break;
            }
        }

        $short_link = new Link();
        $short_link->short_url = $short_url;
        $short_link->long_url = $request['long_url'];
        $short_link->clicks = 0;
        if ($short_link->save()) {
            $message = 'Shorten Link Successful';
        } else {
            $message = 'Shorten Link Failed';
        }
        return redirect()->route('index')->with(['message' => $message, 'shorten_link' => $short_url]);
    }

    private function randomURL($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
