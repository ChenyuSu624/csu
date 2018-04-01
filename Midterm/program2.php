<?php

include "../dbConnection.php";
$dbConn = getDatabaseConnection("midterm");

echo "<strong>Report1 Name and country of birth of female who were NOT born in the USA.</strong><br /><br />";
$sql = "SELECT `firstName`,`lastName`,`country_of_birth` 
        FROM `celebrity` 
        WHERE country_of_birth != 'USA'
        AND gender = 'F'
        ORDER BY lastName";
        
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['firstName']. " -- ". $record['lastName']." -- ".$record['firstName']."<br /><br />";
}	 
echo "<hr>";

echo "<strong>Report2 Number of movies per category and their average duration </strong><br /><br />";
$sql = "SELECT `movie_category` , COUNT(`movie_category`) Number_of_Movie, AVG(`duration`) Average_Duration
        FROM `movie`
        GROUP by `movie_category`";
        
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['movie_category']. " -- ". $record['Number_of_Movie']." -- ".$record['Average_Duration']."<br /><br />";
}
echo "<hr>";

echo "<strong>Report3 Top three longest movies released after 2000  </strong><br /><br />";
$sql = "SELECT `movie_title`,`movie_category`,`duration`,`company`,`release_year`
        FROM `movie`
        WHERE release_year >2000
        ORDER by duration DESC
        LIMIT 3";
        
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['movie_title']. " -- ". $record['movie_category']." -- ".$record['duration']." -- ".$record['company']." -- ".$record['release_year']."<br /><br />";
}
	echo "<hr>";
	
	
echo "<strong>Report4 List of actors and actresses who have not won an academy award, ordered by last name </strong><br /><br />";
$sql = "SELECT `firstName`,`lastName` 
    FROM celebrity c
    LEFT JOIN oscar o ON c.celebrityId = o.celebrity_id
    LEFT JOIN award_category a ON a.award_cat_id = o.award_cat_id
    WHERE a.award_category IS NULL";
        
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['firstName']. " -- ". $record['firstName']."<br /><br />";
}
echo "<hr>";




echo "<strong>Report5 List of celebrities who have won an oscar, ordered by 'award_year'. Include full name, movie title, oscar year, and award category.  </strong><br /><br />";
$sql = "	SELECT `firstName`,`lastName`,`movie_title` ,`award_category`,`award_year`
FROM celebrity c
INNER Join oscar o on c.celebrityId = o.celebrity_id
INNER JOIN award_category a on a.award_cat_id = o.award_cat_id
INNer JOIN movie m on m.movieId = o.movieId
WHERE a.award_category IS NOT NULL
ORDER by o.award_year";
        
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['firstName']. " -- ". $record['lastName']." -- ".$record['movie_title']." -- ".$record['award_category']." -- ".$record['award_year']."<br /><br />";
}
	echo "<hr>";
	

?>
  <!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <hr>
<table width="600" border="1">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>Name and country of birth of female actresses who were NOT born in the USA, ordered by last name</td>
      <td width="20" align="center">15</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>Number of movies per category and their average duration</td>
      <td width="20" align="center">15</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>All info about the top three longest movies released after 2000</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
       <td>4</td>
       <td>List of  actors and actresses who have not won an academy award, ordered by last name </td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#99E999">
      <td>5</td>
      <td>List of celebrities who have won an oscar, ordered by "award_year". Include full name, movie title, oscar year, and award category.</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>6</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    
  <hr>
    </body>
</html>
  
