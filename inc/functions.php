<?php 
    /******************************************
    Project 1 - Build a Random Quote Generator using 
    - PHP
    - Array of quotes fetched from JSON file
    ******************************************/

    // Get the content of the JSON File using file_get_contents()
    $info_from_file = file_get_contents('quotes.json');
    // decode the JSON using json_decode()
    $json = json_decode($info_from_file, true); // decode into associative array
    $array_of_quotes = $json['quotes_list'];
    

    /* Fetch a random quote array from the quotes array  
    and return it */
    function getRandomQuote($all_of_quotes) {
        $random_num = rand(0, 4);
        $quote_array = $all_of_quotes[$random_num];
        
        return $quote_array;
    }
    

    /* Plug the information from the random quote array into
    the html and return it */
    function printQuote() {
        // get random quote
        $random_quote = getRandomQuote($GLOBALS['array_of_quotes']);

        $the_quote = $random_quote['quote'];
        $the_source = $random_quote['source'];
        $the_citation = $random_quote['citation'];
        $the_year = $random_quote['year'];
        
        $all_the_html = "<p class='quote'>$the_quote</p>
                         <p class='source'>$the_source 
                         <span class='citation'>$the_citation</span>
                         <span class='year'>$the_year</span>
                         </p>";

        return $all_the_html;
    }

?>