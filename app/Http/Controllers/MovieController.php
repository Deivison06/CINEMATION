<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $baseURL = env('MOVIE_DB__BASE_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');
        $MAX_BANNER = 3;
        $MAX_MOVIE_ITEM = 10;
        $MAX_SHOWS_ITEM = 10;

        // Hit API Banner
        $bannerResponse = Http::get("{$baseURL}/trending/movie/week", [
            'api_key' => $apiKey,
        ]);

        // prepare variable
        $bannerArray = [];
         
        // Check API Response
        if ($bannerResponse->successful()) {
           // Check data is null or not
            $resultArray = $bannerResponse->object()->results;

            if (isset($resultArray)) {
               //Loping response data
               foreach ($resultArray as $item){
                // save response data to new variable
                array_push($bannerArray, $item);

                // max 10 items
                if (count($bannerArray) == $MAX_BANNER) {
                    break;
                }
               }
            }
        }

        // Hit API Top 10 Movies
        $moviesResponse = Http::get("{$baseURL}/movie/top_rated", [
            'api_key' => $apiKey,
        ]);

        $moviesArray = [];
         
        // Check API Response
        if ($moviesResponse->successful()) {
            // Check data is null or not
            $resultArray = $moviesResponse->object()->results;

            if (isset($resultArray)) {
               //Loping response data
               foreach ($resultArray as $item){
                // save response data to new variable
                array_push($moviesArray, $item);

                // max 3 items
                if (count($moviesArray) == $MAX_MOVIE_ITEM) {
                    break;
                }
               }
            }
        }

         // Hit API Top 10 Movies
         $showsResponse = Http::get("{$baseURL}/tv/top_rated", [
            'api_key' => $apiKey,
        ]);

        $showsArray = [];
         
        // Check API Response
        if ($showsResponse->successful()) {
            // Check data is null or not
            $resultArray = $showsResponse->object()->results;

            if (isset($resultArray)) {
               //Loping response data
               foreach ($resultArray as $item){
                // save response data to new variable
                array_push($showsArray, $item);

                // max 3 items
                if (count($showsArray) == $MAX_MOVIE_ITEM) {
                    break;
                }
               }
            }
        }

        return view('home', [
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'banner' => $bannerArray,
            'topMovies' => $moviesArray,
            'topShows' => $showsArray
        ]);
    }
}
