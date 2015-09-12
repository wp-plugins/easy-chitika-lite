<?php

/*
  Copyright (C) 2008 www.ads-ez.com

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License as
  published by the Free Software Foundation; either version 3 of the
  License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful, but
  WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
  General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

$plugindir = $this->URL;
$defaults = array
    (
    "defaultText" => "Please generate and paste your ad code here.",
    "tabs" =>
    array(
        "Chitika" =>
        array(
            "desc" => "<a href='http://chitika.com/' target='_blank'>Chitika</a> shows big ads on your site, only when the user gets there by web searches. It is compatible with Google AdSense. Click on the <a href='http://chitika.com/' target='_blank'>Chitika</a> image to sign up.",
            "referral" => "<a href='https://chitika.com/' style='text-decoration:none;' title='Get Chitika | Premium'><img src='$plugindir/chitika.png' style='border:0' alt='Get Chitika | Premium' title='Get Chitika | Premium' /></a>",
        )
    )
);
