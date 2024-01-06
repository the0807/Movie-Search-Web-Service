<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php
            if(empty($_REQUEST["movie_name"])) {
                $movie_name ="";
            }
            else{
                $movie_name =$_REQUEST["movie_name"];
                header('Content-Type: text/html; charset=UTF-8');

                $cmd = "cd /home/the0807/Jupyter/ML && python3 movie.py '$movie_name'";
                exec($cmd, $output);  
            }

            //print_r($output);
            //echo $output[0]. "";
            //echo $output[1]. "";

        ?>

        <form method="post" action="" class="wp-block-search__button-outside wp-block-search__icon-button wp-block-search">
        <!--
        <label for="wp-block-search__input-1" class="wp-block-search__label">영화 제목:</label>
        -->
            <div class="wp-block-search__inside-wrapper">
                <input type="text" name="movie_name" class="p-block-search__input" placeholder="영화 제목" autofocus style="width:500px;">
                <button type="submit" class="wp-block-search__button has-icon wp-element-button"><svg class="search-icon" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>    
                </svg></button></div></form>
            
        <?php
            //print_r($output);
            echo "<p>• 검색 버튼 클릭 후 약 15초 뒤 결과가 출력됩니다.</p>";
            echo "<br>";
            //echo $output[0]. "";
            //echo $output[1]. "";
        ?>

        <form method="post" action="" class="wp-block-search__button-outside wp-block-search__icon-button wp-block-search">
        <label for="wp-block-search__input-1" class="wp-block-search__label">요약:</label>
            <div class="wp-block-search__inside-wrapper">
                <textarea class="p-block-search__input" style="width:605px; height:200px; line-height:180%;" disabled><?php echo $output[0]. ""; ?></textarea>
            </div></form>
        
    </body>
</html>

