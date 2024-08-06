# Ricetta, The Recipe Generator 

Ricetta, the recipe generator website, offers a wide array of features including curated recipes, expert cooking advice, and a unique recipe generator that allows users to input available ingredients and receive a customized list of recipes that can be made with those ingredients.

**Technologies used**: HTML - CSS - JavaScript - PHP - MySQL - BootStrap 

## Key Features:

#### 1. Home Page

Ricetta’s home page is visually appealing and user-friendly, offering:

- Clear Navigation: Easy access to various sections of the site.
  
- Engaging Visuals: High-quality images of recipes to entice users.
  
- Main Features: Highlighting the core functionalities - exploring recipes, creating custom recipes, and searching by ingredients.
  
- Daily Highlight: Featuring a "Recipe of the Day" to keep the content fresh and engaging.
  
- Additional Content: Providing extra recipes and guides to keep users engaged.

<p align="center">
  <img width="319" alt="Screenshot 2024-08-06 at 11 53 44 AM" src="https://github.com/user-attachments/assets/6c7a4886-f7a8-43f5-9e38-aeeb68122aea">
</p>

#### 2. Login/Sign Up Page

- Layout Tool: Bootstrap 4 is used for the page layout.
  
- Authentication Modal: Includes a modal that prompts users to either log in or sign up.
  
- Form Fields:
  
  - Username input field
    
  - Password input field
    
- Buttons:

  - "Login" button for existing users
    
  - "Sign Up" link for new users
    
- Validation: Initially attempted with JavaScript but switched to PHP for better functionality.

<p align="center">
<img width="472" alt="Screenshot 2024-08-06 at 12 06 39 PM" src="https://github.com/user-attachments/assets/5fbf6060-54a1-4834-a268-efc0355007b2">
</p>

<p align="center">
<img width="471" alt="Screenshot 2024-08-06 at 12 08 23 PM" src="https://github.com/user-attachments/assets/21eb62c0-b55b-4abc-8ba5-26d18db2c1d5">
</p>

<p align="center">
<img width="534" alt="Screenshot 2024-08-06 at 12 08 53 PM" src="https://github.com/user-attachments/assets/185f5e0a-949b-4b38-a1a9-bd325652ab2b">
</p>

#### 3. User Profile

- Profile Page:
  
  - Header: Displays the logo of Riccella - The Recipe Generator and a welcoming message ("Welcome back, CristianoCr7").
    
  - Navigation Icons: Includes icons for searching by ingredient, creating a recipe, exploring, and accessing favorites.
    
  - Recommendation Section: Showcases "Our Recommendations this week" with images and titles of suggested recipes like Chicken Pasta Salad, Chicken Popcorn, Vegetable Quesadilla, and 
    Pancakes.
  
  - Footer: Contains copyright notice, links to the company information, and terms of service.

<p align="center">
    <img width="419" alt="Screenshot 2024-08-06 at 12 13 51 PM" src="https://github.com/user-attachments/assets/11db9534-71e3-4cbc-88c8-2b1517820932">
</p>

- Sidebar Menu (From the User Profile):
  
  - User Identification: Shows the username "User: CristianoCr7" at the top.
  
  - Menu Options:
    
    - Home
    - Search
    - My Favorites
    - My Recipes
    - Add A Recipe
    - Surprise Me!
    - Logout
 
   <p align="center">
      <img width="398" alt="Screenshot 2024-08-06 at 12 14 12 PM" src="https://github.com/user-attachments/assets/b1bbe19d-5d51-48f4-aca0-87793a624b44">
    </p>
      
- "Surprise Me!" Feature Modal:
  
  - Functionality: The sidebar includes a "Surprise Me!" option, which when clicked, triggers a modal that generates a random recipe from the database.
    
  - Modal Content: Displays a large image of the generated recipe, in this case, a "Vegetable Quesadilla", indicating that the feature provides a random recipe selection to the user 
    for exploration and inspiration.
    
<p align="center"> 
<img width="452" alt="Screenshot 2024-08-06 at 12 14 35 PM" src="https://github.com/user-attachments/assets/d8ba46da-50d5-4d0c-b80e-a116c2c5a9b7">
    </p>

#### 4. User Favourites   

This page features a section titled "Liked Recipes," displaying user-favored dishes such as Creamy Tuscan Chicken, Pancakes, Blueberry Muffins, and Greek Beef Pasta with high-quality images. A footer provides additional links about the company and an "Explore more..." button encourages further browsing of recipes. 

<p align="center"> 
<img width="442" alt="Screenshot 2024-08-06 at 12 18 40 PM" src="https://github.com/user-attachments/assets/0c4b29db-e233-4cb8-85f8-a0d6e5dc6a1e">
  </p>

#### 5. Recipe page

- Title and Heart Icon: At the top, the recipe title "Pancakes" appears with a heart icon beside it, indicating a feature to like the recipe.
  
- Image Carousel: A main image of pancakes is displayed, and a carousel allows users to view more images related to the recipe.
  
- Recipe Description: Below the image, there is a brief description or note on the pancakes, suggesting their ease of preparation and superiority over pre-packaged mixes.
  
- Ingredients List: Lists necessary ingredients such as milk, salt, flour, baking powder, sugar, butter, and eggs.
  
- Cooking Method: Provides step-by-step instructions on how to prepare the pancakes.
  
- Additional Details: Includes information on preparation time, cooking time, and the number of servings.
  
This page design supports user interaction and provides all the necessary details for cooking, making it both informative and user-friendly.

<p align="center"> 
<img width="264" alt="Screenshot 2024-08-06 at 12 22 18 PM" src="https://github.com/user-attachments/assets/d036de7f-ed39-4ebd-9fc2-fd5ca699a345">
  </p>

#### 6. New Recipe page

The page is designed for users to contribute their own recipes.

- Form to Add New Recipe:
  
  - Recipe Name: A field for entering the name of the recipe.
    
  - Upload Recipe Image: Options to upload up to two images for the recipe.
    
  - Recipe Description: A text box for a brief description of the recipe.
    
  - Ingredients Needed: A field for listing the ingredients required.
    
  - Recipe Type: Checkboxes to classify the recipe as breakfast, lunch, dinner, dessert, salad, or snack.
    
  - Cooking Steps: A large text area to describe the steps involved in making the recipe.
    
  - Recipe Timing: Fields to input the preparation time, cooking time, and the number of servings.
    
  - Special Attributes: Checkboxes to tag the recipe with special attributes like gluten-free, lactose-free, dairy-free, or specific cuisines (Indian, Chinese, Lebanese, Korean).
    
- Submit Button: A red button labeled "Submit" for submitting the form.
  
- Validation: The form validation is handled using PHP, ensuring the input data meets the required format and completeness.

<p align="center"> 
  <img width="458" alt="Screenshot 2024-08-06 at 12 25 50 PM" src="https://github.com/user-attachments/assets/15fe9e7c-2f57-4bbd-b8af-330cef65a524">
 </p>

#### 7. Explore page

This page is designed to showcase a diverse array of recipes, allowing users to find and select dishes based on their cooking and preparation time preferences. 

- Recipe Display: Recipes are shown in a grid layout, each with a photo and basic details.
  
- Timing Information: Each recipe card includes the cooking time and prep time to give users quick insight into how long each dish will take to prepare.
  
- Design and Layout: The use of images and concise timing details in a tabular format makes the recipes appealing and easy to browse.

<p align="center"> 
  <img width="481" alt="Screenshot 2024-08-06 at 12 28 07 PM" src="https://github.com/user-attachments/assets/c08585a4-ea24-492d-a60b-c0a1c487eb9a">
 </p>

#### 8. Search by ingredients page

This page allows users to search for recipes based on the ingredients they have.

- Search Functionality:
  - Main Feature: A dynamic search tool where users can specify ingredients they possess.
    
  - Expandable Divs: Ingredients are categorized and listed within expandable divs that open when clicked. These categories include Vegetables, Fruits, Dairies & Eggs, Poultry,    
    Herbs/Spices, Oils, Condiments/Sauces, and Grains, Nuts, and Baking Products.
  
  - Checkboxes: Each ingredient within the categories can be selected through checkboxes, allowing users to filter recipes based on multiple ingredients simultaneously.

- Search Button: A prominent search button at the bottom initiates the recipe search based on selected ingredients.

<p align="center"> 
<img width="440" alt="Screenshot 2024-08-06 at 12 33 46 PM" src="https://github.com/user-attachments/assets/e75208d8-efd8-463f-885b-b0a8cb049a4a">
 </p>
  
#### 9. Search by Name/Tag:

This page is designed for users to find recipes either by name or by associated tags.

- Functionality:
  
  - Search by Name: When users search for recipes by their names, the results display recipes that match the entered name. Each result includes the recipe name, cooking time, prep 
    time, and number of servings. The recipe images are clickable, directing users to the detailed recipe page.
    
  - Search by Tag: Searching by tags, such as ingredients or dish type, brings up recipes associated with those tags. This feature allows users to explore recipes based on specific 
    characteristics or ingredients they are interested in.
  
<p align="center">   
<img width="700" alt="Screenshot 2024-08-06 at 12 36 21 PM" src="https://github.com/user-attachments/assets/f50a90cb-0c0b-4af7-b272-cda8906b6571">
 </p>

#### 10. About Ricetta:

This page showcases details about the platform and its team.

<p align="center"> 
<img width="1435" alt="Screenshot 2024-08-06![Uploading Screenshot 2024-08-06 at 12.39.41 PM.png…]()
 at 12 39 27 PM" src="https://github.com/user-attachments/assets/a1c53778-f81d-476e-a120-05717bbdef26">
 </p>

 <p align="center"> 
 <img width="1440" alt="Screenshot 2024-08-06 at 12 40 05 PM" src="https://github.com/user-attachments/assets/050f959f-f81f-4c42-b7b5-06db8ed742f6">
 </p>

 ## Technical Aspects:
 
- HTML: Provides the basic structure of the website, creating the framework for all web pages.

- CSS: Styles the website, ensuring a visually appealing and consistent user interface across different web pages.

- JavaScript: Adds interactivity to the web pages, enabling dynamic features like real-time updates when users search for recipes or interact with the recipe generator.

- PHP: Handles server-side logic, including processing user inputs (like ingredients for recipes), interacting with the database, and dynamically generating web pages based on user requests.

- MySQL: Manages the database that stores all user data, recipe information, ingredients, and other related content, allowing for efficient data retrieval and storage.

- Bootstrap: A framework used to develop responsive and mobile-friendly web pages, ensuring the website is accessible and user-friendly across various devices and screen sizes.
