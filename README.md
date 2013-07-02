Instagram feed for beginners
========================

Getting your head round a new API, can be a daunting task for anyone. Epecially if you only have a basic understanding of code. That's why I've submitted an Instagram feed, that hopefully everyone can use with ease.

Overview
========================

- Custom html styling (Not required)
- Limit the number of entries returned (Maximum 20)
- Caching

Parameters
========================

- Caching time
- Cache file location.
- Image limit

Usage
========================

This feed is reliant on http://followgram.me/, which takes care of that nasty API babble. So the first thing you'll need to do is register with their site and setup your username.

Once you have registered, you'll need to change the username parameter to your selected username. You can also change the html structure and class, should you want to style it to fit your sites design.

Next upload all files to your main directory, and then just include the file whereever you want the feed to show. (<?php include('instagram.php') ?>)

You can also use CSS or Javascript to control the size of the images.


Credits
========================

Initial idea came when I stumbled across this article by Snipplr.
http://snipplr.com/view/58083/

I cleaned up the code and added caching fucntionality.

License
========================

The MIT License (MIT)

Copyright (c) 2013 Andrew Biggart

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
