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
</select>
