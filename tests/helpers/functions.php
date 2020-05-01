<?php

function create($class,$attr = [])
{
   return factory($class,$attr)->create();
}

function make($class,$attr = [])
{
   return factory($class,$attr)->make();
}

