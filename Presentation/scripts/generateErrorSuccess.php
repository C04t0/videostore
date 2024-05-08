<?php

    declare(strict_types=1);

    function generateDvdErrorSuccess($error, $success) : ?string {
        ob_start();

        if ($error === "dvdIdExists") {
            echo "<p class='error'>A dvd with this id already exists!</p>";
        }

        if ($error === "dvdMovieIdInvalid") {
            echo "<p class='error'>Something went wrong! Either dvd id already exists or movie title - dvd id combo is invalid.</p>";
        }

        if ($success) {
            echo "<p class='success'>Dvd successfully added!</p>";
        }
        return ob_get_clean();
    }
    function generateDvdFoundSuccess($error, $success, $movie, $dvdList) : ?string {
        ob_start();
        if ($error === "DvdNotFound") {
            echo "<p class='error'>Dvd not found!</p>";
        }
        if ($error === "invalidId") {
            echo "<p class='error'>Something went wrong. We couldn't find anything in matching this id</p>";
        }
        if ($success) {
            echo "<table id='movieOverview' class='overview'>
        <caption>Movie Overview</caption>
        <tr>
            <th>Title</th>
            <th>Dvd numbers</th>
            <th>Available</th>
        </tr>
        <tr>" . generateSingleMovieOverview($movie, $dvdList) . "
        </tr>
    </table>";
        }
        return ob_get_clean();
    }
    function generateDvdDeleteSuccess($success) : ?string {
        ob_start();
        if ($success) {
            echo "<p class='success'>Dvd has been successfully deleted!</p>";
        }
        return ob_get_clean();
    }
    function generateDvdRentSuccess($success) : ?string{
        ob_start();
        if ($success) {
            echo "<p class='success'>DVD has been successfully rented!</p>";
        }
        return ob_get_clean();
    }
    function generateDvdReturnSuccess($success) : ?string {
        ob_start();
        if ($success) {
            echo "<p class='success'>DVD has been successfully returned!</p>";
        }
        return ob_get_clean();
    }
    function generateMovieErrorSuccess($error, $success) : ?string {
        ob_start();
        if ($error === "movieExists") {
            echo "<p class='error'>Title already exists!</p>";
        }
        if ($success) {
            echo "<p class='success'>Movie title successfully added!</p>";
        }
        return ob_get_clean();
    }
    function generateMovieDeleteErrorSuccess($error, $success) : ?string {
        ob_start();
        if ($error === "dvdnotFound") {
            echo "<p class='error'>Something went wrong, DVD id not found </p>";
        }
        if ($success) {
            echo "<p class='success'>Movie title has been successfully deleted!</p>";
        }
        return ob_get_clean();
    }
