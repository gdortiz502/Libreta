<?php

    class Connection{

        public static function Connect(){

            $link = new PDO("mysql:host=localhost;dbname=agenda",
							"root",
							"");

			$link -> exec("set names utf8");

			return $link;

        }

    }