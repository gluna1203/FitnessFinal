<?php
header("Content-type: text/css");

$font_family = 'Arial, Helvetica, sans-serif';
$font_size = '0.7em';
$border = '1px solid';

?>

<style type="text/css">

html{}



h2 {
    font-size: 1.5em;
    background: var(--main-gradient);
    background-size: 800% 1200%;
    animation: gradient 40s ease infinite;
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

/*
    nav

*/
.navigation {
    display: block;
    padding: 8px;
    background-color: #dddddd;
}



.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: red;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: red;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}

/*
    nav
*/

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}


form {
    border: 2px solid #333;
    width: fit-content;
    padding: 3px;
    border-collapse: collapse;
    background: var(--main-gradient);
    background-size: 400% 400%;
    animation: gradient 40s ease infinite;
}

input {
    font-family: 'Roboto Slab', serif;
    background-color: #0000;
}

    input[type=submit] {
        font-size: 1em;
        margin-bottom: 10px;
        border: none;
        border-bottom: 2px solid var(--main-color);
        outline: none;
        color: var(--main-color);
        background: linear-gradient(to bottom, transparent 80%, white 98%, transparent );
        text-decoration: none;
        cursor: pointer;
        height: fit-content;
    }

    /** Input Boxes */
    input[type=text], input[type=password], input[type=email], input[type=number] {
        padding-left: 5px;
        outline: none;
        border: none;
        background: linear-gradient(to left, transparent, white 98%, transparent );
        clip-path: inset(0px 0px 0px 3px);
        border-radius: 2px;
    }

        input[type=text]:hover, input[type=password]:hover, input[type=email]:hover, input[type=number]:hover,
        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=number]:focus {
            clip-path: none;
        }


/*
         HEX:
    gold: #b7a261
    black: #0d0d0d
    teal: #005858
    deep green: #045206
*/

:root {
    /* font-family: monospace; */
    font-family: 'Roboto Slab', serif;
    --main-color: #333;
    --highlight-color: #ffb7ff;
    --tertiary-color: #889;
    --color1: #b7a261;
    --color2: #0d0d0d;
    --color3: #005858;
    --color4: #045206;
    --color5: #045206;
    user-select: none;
    --main-gradient: linear-gradient(-45deg, var(--color1), var(--color2), var(--color3), var(--color4), var(--color5));
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}



#divider {
    display: flex;
}

#leftSide {
    flex: 1;
}

#rightSide {
    flex: 1;
}


footer{}

body{
    background: #444;
    color: var(--main-color);
    border-radius: 5px solid var(--tertiary-color);
}

</style>
