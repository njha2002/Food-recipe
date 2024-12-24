<?php
// Handle recipe submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipe_name = htmlspecialchars($_POST['recipe-name']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $instructions = htmlspecialchars($_POST['instructions']);
    
    // Validate data
    if (!empty($recipe_name) && !empty($ingredients) && !empty($instructions)) {
        // Save recipe to a text file (you can use a database instead)
        $file = 'recipes.txt';
        $recipe_entry = "Recipe Name: " . $recipe_name . "\n";
        $recipe_entry .= "Ingredients: " . $ingredients . "\n";
        $recipe_entry .= "Instructions: " . $instructions . "\n";
        $recipe_entry .= "--------------------------------------------\n";
        
        if (file_put_contents($file, $recipe_entry, FILE_APPEND)) {
            echo "Recipe submitted successfully!";
        } else {
            echo "Error saving the recipe.";
        }
    } else {
        echo "All fields are required.";
    }
}
?>
