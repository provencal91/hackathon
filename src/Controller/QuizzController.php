<?php


namespace App\Controller;

use App\Model\MoviesManager;

class QuizzController extends AbstractController
{

    public function quizz()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $moviesByYear = $moviesManager->selectByYear(2013);
        return $this->twig->render('Quizz/quizz.html.twig', [
            'movies' => $movies,
            'moviesByYear' => $moviesByYear
        ]);
    }

    public function quizzTitle()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $moviesPosters = $moviesManager->randomPosters();
        $moviesNotPosters = $moviesManager->randomWrongPosters();
        return $this->twig->render('Quizz/quizzTitle.html.twig', [
            'movies' => $movies,
            'moviesPosters' => $moviesPosters,
            'moviesNotPosters' => $moviesNotPosters,
        ]);
    }

    public function quizz2()
    {
        //calling MoviesManager
        $moviesManager = new MoviesManager();
        $movies = $moviesManager->selectAll();
        $randomMovie = $moviesManager->randomId();
        $randomWrongMovie = $moviesManager->randomWrongId();
        return $this->twig->render('Quizz/quizz2.html.twig', [
            'randomWrongMovies'=>$randomWrongMovie,
            'randomMovies'=>$randomMovie,
            'movies'=>$movies
        ]);
    }
}
