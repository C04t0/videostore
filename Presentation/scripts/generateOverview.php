<?php
    declare(strict_types=1);

    function generateDvdOverview($dvdList) : ?string {
        ob_start();
        foreach ($dvdList as $dvd) {
            echo "<td>" . $dvd->getId(). "</td>";

        }
        return ob_get_clean();
    }

    function generateDvdOverviewAvailableShown($dvdList) : ?string {
        ob_start();
        foreach ($dvdList as $dvd) {
            if (!$dvd->isRented()) {
                echo "<td><b class='available'>" . $dvd->getId() . "</b></td>";
            } else {
                echo "<td><b class='unavailable'>" . $dvd->getId() . "</b></td>";
            }
        }
        return ob_get_clean();
    }
    function generateSingleMovieOverview($movie, $dvdList) : ?string {
        ob_start();
        $available = 0;
        echo "<tr>
                <td>" . $movie->getTitle() . "</td>
                <td>";
        foreach ($dvdList as $dvd) {
            if ($dvd->getMovieId() == $movie->getId()) {
                if (!$dvd->isRented()) {
                    $available++;
                    echo "<b class='available dvdId'>" . $dvd->getId() . "</b>";
                } else {
                    echo "<b class='dvdId'>" . $dvd->getId() . "</b>";
                }
            }
        }
        echo "</td>
               <td>" . $available . "</td></tr>";

        return ob_get_clean();
    }

    function generateMovieOverview ($movieList, $dvdList) : ?string {
        ob_start();

        foreach ($movieList as $movie) {
            $available = 0;
            ?>
            <tr>
                <td><?php echo $movie->getTitle() ?></td>
                <td>
                    <?php
                        foreach ($dvdList as $dvd) {
                            if ($dvd->getMovieId() == $movie->getId()) {

                                if (!$dvd->isRented()) {
                                    $available++;
                                    echo "<b class='available dvdId'>" . $dvd->getId() . "</b>";
                                } else {
                                    echo "<b class='dvdId'>" . $dvd->getId() . "</b>";
                                }
                            }
                        }
                    ?>
                </td>
                <td>
                    <?php
                        echo $available
                    ?>
                </td>
            </tr>
            <?php
        }
        return ob_get_clean();
    }
    function generateMovieSelect($movieList) : ?string {
        ob_start();
        foreach ($movieList as $movie) {
            echo "<option value='" . $movie->getId() ."'>" . $movie->getTitle() . "</option>";
        }
        return ob_get_clean();
    }
    function generateDvdSelectAvailable($dvdList) : ?string {
        ob_start();
        foreach ($dvdList as $dvd) {
            if (!$dvd->isRented()) {
                echo "<option value='" . $dvd->getId() ."'>" . $dvd->getId() . "</option>";
            }
        }
        return ob_get_clean();
    }
    function generateDvdSelect($dvdList) : ?string {
        ob_start();
        foreach ($dvdList as $dvd) {
            echo "<option value='" . $dvd->getId() . "'>" . $dvd->getId() . "</option>";
        }
        return ob_get_clean();
    }
