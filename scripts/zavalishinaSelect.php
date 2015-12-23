<<<<<<< HEAD
<?php 

if (!file_exists("text.txt")) { 
echo "File not found."; 
} 
else { 
$file = fopen("text.txt", "r"); 
} 
?> 

<select> 
<?php while ($str = fgets($file)) { 
echo "<option>" . $str . "</option>"; 
}; 
?> 
=======
<?php
  if (!file_exists("text.txt")) {
    echo "File not found.";
  }
  else {
    $file = fopen("text.txt", "r");
  }
?>

<select>
<?php
while ($str = fgets($file)) {
  echo "<option>" . $str . "</option>";
};
?>
>>>>>>> bed98be3c172310e67b0756f15012ca55a6f61e7
</select>
