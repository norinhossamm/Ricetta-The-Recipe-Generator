-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 10, 2023 at 10:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ricettadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `contain`
--

CREATE TABLE `contain` (
  `RecipeID` int(11) NOT NULL,
  `IngredientID` int(11) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contain`
--

INSERT INTO `contain` (`RecipeID`, `IngredientID`, `Unit`, `Quantity`) VALUES
(1, 3, 'teaspoon', 0.75),
(1, 4, 'teaspoon', 1.5),
(1, 5, 'teaspoon', 1.5),
(1, 6, 'teaspoons', 1),
(1, 9, 'kg', 0.75),
(1, 13, 'teaspoons', 1),
(1, 15, 'cups', 0.5),
(1, 16, 'cups', 1.5),
(1, 18, 'tablespoons', 3),
(1, 19, 'cloves', 6),
(1, 20, 'tablespoons', 2),
(1, 22, 'cups', 3),
(2, 2, 'cups', 1.25),
(2, 6, 'teaspoon', 0.25),
(2, 23, 'cups', 1.5),
(2, 24, 'teaspoons', 3.5),
(2, 25, 'tablespoon', 1),
(2, 26, 'tablespoons', 3),
(2, 27, 'egg', 1),
(3, 28, 'cups', 1),
(3, 29, 'teaspoon', 0.5),
(3, 30, 'cups', 1),
(3, 31, 'teaspoon', 1),
(3, 32, 'cups', 0.3),
(3, 33, 'cups', 1.5),
(3, 34, 'cups', 1.5),
(4, 1, ' g', 1),
(4, 2, ' Cup', 1),
(4, 37, ' g', 1),
(5, 1, ' g', 1),
(5, 2, ' Cup', 1),
(5, 6, ' g', 1),
(5, 20, ' g', 50),
(5, 26, ' g', 1),
(19, 9, ' g', 50),
(19, 35, ' g', 20);

-- --------------------------------------------------------

--
-- Table structure for table `describes`
--

CREATE TABLE `describes` (
  `RecipeID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `describes`
--

INSERT INTO `describes` (`RecipeID`, `TagID`) VALUES
(1, 2),
(2, 2),
(2, 3),
(2, 5),
(2, 6),
(3, 2),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(5, 5),
(7, 8),
(19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `IngredientID` int(11) NOT NULL,
  `IngredientName` varchar(125) NOT NULL,
  `IngredientTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`IngredientID`, `IngredientName`, `IngredientTypeID`) VALUES
(1, 'Tomato', 1),
(2, 'Milk', 3),
(3, 'black peper', 5),
(4, 'paprika', 5),
(5, 'onion powder', 5),
(6, 'salt', 5),
(7, 'cumin', 5),
(8, 'curry', 5),
(9, 'chickenbreast', 4),
(10, 'chicken thigh', 4),
(11, 'ground meat', 4),
(12, 'Ketchup', 7),
(13, 'musturd', 7),
(14, 'mayonaise', 7),
(15, 'parmesan', 3),
(16, 'heavy cream', 3),
(18, 'sundried tomato ', 2),
(19, 'garlic', 2),
(20, 'parsley', 2),
(22, 'spinach', 2),
(23, 'Flour', 8),
(24, 'Baking Powder', 8),
(25, 'Sugar', 7),
(26, 'Butter', 3),
(27, 'Eggs', 3),
(28, 'brown sugar', 7),
(29, 'cinnamon', 5),
(30, 'blueberries', 1),
(31, 'Vanilla Extract', 7),
(32, 'vegetable oil', 6),
(33, 'yogurt', 3),
(34, 'buttermilk', 3),
(35, 'oliveoil', 6),
(36, 'red pepper flakes', 5),
(37, 'Pasta', 8),
(38, 'Thyme', 2),
(39, 'Oregano', 5),
(40, 'Bell Pepper', 2),
(41, ' Green Olives', 2),
(42, 'Onion', 2),
(43, 'Arugula', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ingredienttype`
--

CREATE TABLE `ingredienttype` (
  `IngredientTypeID` int(11) NOT NULL,
  `IngTypeName` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredienttype`
--

INSERT INTO `ingredienttype` (`IngredientTypeID`, `IngTypeName`) VALUES
(1, 'Fruits'),
(2, 'Vegetables'),
(3, 'Dairies & Eggs'),
(4, 'poultry'),
(5, 'herbs/spices'),
(6, 'oils'),
(7, 'condiments/sauces'),
(8, 'Grain, nuts and baking products');

-- --------------------------------------------------------

--
-- Table structure for table `likedrecipes`
--

CREATE TABLE `likedrecipes` (
  `likeID` int(11) NOT NULL,
  `RecipeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likedrecipes`
--

INSERT INTO `likedrecipes` (`likeID`, `RecipeID`, `UserID`) VALUES
(3, 1, 1),
(4, 2, 1),
(13, 1, 4),
(14, 2, 4),
(19, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `RecipeID` int(11) NOT NULL,
  `RecipeName` varchar(125) NOT NULL,
  `Description` varchar(280) NOT NULL,
  `CookTime` time NOT NULL,
  `PrepTime` time NOT NULL,
  `NServings` int(11) NOT NULL,
  `Steps` text NOT NULL,
  `TypeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `img1` varchar(600) DEFAULT NULL,
  `img2` varchar(600) DEFAULT NULL,
  `img3` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`RecipeID`, `RecipeName`, `Description`, `CookTime`, `PrepTime`, `NServings`, `Steps`, `TypeID`, `UserID`, `img1`, `img2`, `img3`) VALUES
(1, 'Creamy Tuscan Chicken', 'If you are a big fan of creamy dishes, you should save this Creamy Tuscan Chicken to your recipe box. Once you do it, you can make this incredibly delicious chicken dish when ever you have an appetite for. ', '00:25:00', '00:10:00', 4, '1:Season chicken with salt, pepper, paprika and onion powder.\r\n2:Heat 2 tablespoons of reserved sun dried tomato oil in a large skillet over medium-high heat Add chicken an sear for 6-8 minutes on each side, or until golden and cooked through Transfer to a warm plate and set aside.\r\n3:Add remaining oil into pan and fry garlic until fragrant, about 30 seconds to 1 minute.\r\n4:Add sun dried tomatoes. Fry for 1-2 minutes to release their flavors. Add Dijon mustard and stir to combine.\r\n5:Reduce heat medium-low, stir in cream and bring to a gentle simmer; stirring occasionally. Season with salt and pepper to taste.\r\n6:Add in spinach leaves and cook until wilt in sauce. Stir in parmesan cheese and let simmer for a further minute until cheese melts through sauce.\r\n7:Return chicken to pan; top with parsley and serve over pasta, rice or steamed vegetables.\r\n8:Enjoy!.', 1, 1, 'images\\chick.jpeg', 'images\\Creamy 2.jpg', 'images\\Creamy 3.jpg'),
(2, 'Pancakes', 'Perfect pancakes are easier to make than you think. This pancake recipe produces thick, fluffy, and all-around delicious pancakes with just a few ingredients that are probably already in your kitchen (and it is so much better than the boxed stuff). ', '00:15:00', '00:05:00', 8, '1. Sift the dry ingredients together.\r\n2. Make a well, then add the wet ingredients. Stir to combine.\r\n3. Scoop the batter onto a hot griddle or pan.\r\n4. Cook for two to three minutes, then flip.\r\n5. Continue cooking until brown on both sides.', 2, 1, 'images/pancakesuserprofile.jpg', 'images/pancakes1.webp', 'images/pancakes2.webp'),
(3, 'BLUEBERRY MUFFINS', 'Simple, maple-sweetened blueberry muffins that are jam-packed full of fresh berries.the last blueberry muffin recipe you will ever need.', '00:20:00', '00:07:00', 4, '1: Preheat the oven to 400°F. Lightly grease the cups of a standard muffin pan (12 muffins); or line with paper baking cups, and grease the paper cups.\r\n2: Weigh your flour; or measure it by gently spooning it into a cup, then sweeping off any excess.\r\n3: Whisk together the flour, brown sugar, salt, baking powder, baking soda, and cinnamon. Stir in the blueberries last.\r\n4: In a separate bowl, whisk together the vanilla, vegetable oil, and buttermilk or yogurt.\r\n5: Pour the liquid ingredients into the dry ingredients, stirring just to combine.\r\n6: Spoon the batter into the prepared muffin cups, filling them full. A slightly heaped muffin scoop of batter is the right amount.\r\n7: Sprinkle the tops of the muffins with coarse sparkling sugar or cinnamon sugar, if desired.\r\n8: Bake the muffins for 18 to 20 minutes, until a toothpick inserted into the middle of one of the center muffins comes out clean.\r\n9: Remove the muffins from the oven, and after 5 minutes (or when they\'re cool enough to handle) transfer them to a rack to cool. Serve warm, or at room temperature. Store leftovers loosely wrapped at room temperature for several days; freeze for longer storage.', 4, 2, 'images/Muffins.jpg', 'images/bluberrymuffins1.jpg', 'images/bluberrymuffins2.jpg'),
(4, 'Greek Beef Pasta', 'Greek Pasta with beef', '00:10:00', '01:30:00', 2, '1.Cook the pasta^2.Prepare the beef^3.Put the beef on the pasta', 1, 2, 'images\\Greek beef pasta bake.jpg', 'images\\Chicken-Pasta-Salad-recipe.jpg', 'images\\Spaghetti & Spinach with Sun-Dried Tomato Cream Sauce.jpg'),
(5, 'Vegetable Quesadilla', 'These Vegetable Quesadillas are customizable to suit taste or what you have available. A great mid-week/weekend meal.', '00:30:00', '00:30:00', 4, '1.Prepare your totrilla^2.Cut your vegetables.^3.Make Vegetable Quesadilla.', 3, 2, 'images\\Loaded Vegetable Quesadillas.jpg', 'images\\Crave-Worthy Vegetable Quesadillas.png', 'images\\Cheesy Ground Beef Quesadillas.jpg'),
(6, 'Chicken Pasta Salad', 'Healthy Chicken Pasta Salad Recipe – Packed with flavor, protein, and veggies! This healthy chicken pasta salad is loaded with tomatoes, avocado, and fresh basil. If you’re looking for a nutritious salad for lunch or recipes ideas for a potluck, this chunky chicken pasta salad wi', '00:15:00', '00:10:00', 12, '1:To make this healthy chicken pasta salad recipe: In a large bowl, add the salad ingredients, the shredded chicken, avocado, onion, avocado, cherry tomatoes, and basil.^\r\n2:In a jar, combine the ingredients for the dressing: vinegar, Italian seasoning, Olive oil, salt and pepper.^\r\n\r\n 3:Cook Pasta: Meanwhile, cook the pasta in a pot of boiling salted water, according to the package\r\ndirections. Drain, rinse and transfer to a large mixing bowl. Set aside.^\r\n\r\n 4:Cut Chicken: While the pasta is cooking, prepare the chicken. Slice the chicken breasts crosswise to create long (0.5-inch thick) strips.^\r\n\r\n 5:Marinate Chicken: In a mixing bowl, combine 1 tablespoon olive oil with the thyme, oregano, garlic, and a pinch of salt and pepper. Add in the chicken pieces and stir to coat.^\r\n\r\n 6:Cook Chicken: Heat a large non-stick pan over medium heat. Add the chicken in a single layer, and cook for 6-8 minutes, or until cooked through and golden on the sides.^\r\n\r\n 7:Assemble Pasta Bowl: Transfer the chicken along with any accumulated juices to the pasta bowl. Add the pepper and onion, cherry tomatoes, olives, parmesan, and arugula. Pour over the dressing and toss to combine.^\r\n \r\n 8:Season and Serve: Season to taste with more salt and pepper, if necessary, and serve warm or chilled.^\r\n \r\n 8:Enjoy!^', 6, 4, 'images/Chicken-Pasta-Salad-recipe.jpg', 'images/chickensalad1.jpg', 'images/chickensalad2.jpg'),
(19, 'Chicken Popcorn', 'Popcorn chicken is a dish of bite-sized chunks of deep-fried chicken that are sure to be a family favorite. I love to serve the chicken with mashed potatoes and green beans', '00:10:00', '00:30:00', 4, '1.Cut your chicken breast^2.Fry it in olive oil.', 6, 2, 'images\\BFV11503_CheddarRanchPopcornChicken-ThumbTextless1080.jpg', 'images\\Popcorn-Chicken-v3.jpg', 'images\\BFV11503_CheddarRanchPopcornChicken-ThumbTextless1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipetype`
--

CREATE TABLE `recipetype` (
  `TypeID` int(11) NOT NULL,
  `TypeName` varchar(125) NOT NULL,
  `NoRecipes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipetype`
--

INSERT INTO `recipetype` (`TypeID`, `TypeName`, `NoRecipes`) VALUES
(1, 'Lunch', 12),
(2, 'Breakfast', 3),
(3, 'Dinner', 1),
(4, 'Dessert', 0),
(5, 'Salad', 0),
(6, 'Snacks', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `TagID` int(10) NOT NULL,
  `TagName` varchar(50) NOT NULL,
  `NoofRecipes` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`, `NoofRecipes`) VALUES
(1, 'Gluten-free', 14),
(2, 'Lactose-free', 12),
(3, 'Dairy-free', 9),
(4, 'Keto', 8),
(5, 'Chinese', 11),
(6, 'Indian', 12),
(7, 'Lebanese', 11),
(8, 'Korean', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(125) NOT NULL,
  `UserPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserPassword`) VALUES
(1, 'taylor07', '123456789'),
(2, 'CristianoCr7', '$2y$10$e13r9WzHFj85.5EfEHETbuwNT/mVzHz4ZmwFN024aKhpVy.q7gxbW'),
(3, 'FarahAtef7', '$2y$10$NQcTE.i9yBYSlLNm.ZCgx.564c1QjyBV8Z.QQJ/EG5ctDZpgxOXN6'),
(4, 'NarnarKhalid', '$2y$10$0CBUie4p7NlS3ARPIoWm/OJ.bJy7uLYMFcW7rHNsvlaspYu.ocEzW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contain`
--
ALTER TABLE `contain`
  ADD PRIMARY KEY (`RecipeID`,`IngredientID`),
  ADD KEY `FK_foringid` (`IngredientID`);

--
-- Indexes for table `describes`
--
ALTER TABLE `describes`
  ADD PRIMARY KEY (`RecipeID`,`TagID`),
  ADD KEY `Tag_idfk` (`TagID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`IngredientID`),
  ADD UNIQUE KEY `IngredientID` (`IngredientID`),
  ADD UNIQUE KEY `IngredientName` (`IngredientName`),
  ADD KEY `FK_ingtype` (`IngredientTypeID`);

--
-- Indexes for table `ingredienttype`
--
ALTER TABLE `ingredienttype`
  ADD PRIMARY KEY (`IngredientTypeID`);

--
-- Indexes for table `likedrecipes`
--
ALTER TABLE `likedrecipes`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `FK_likedUs` (`UserID`),
  ADD KEY `FK_likeR` (`RecipeID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`RecipeID`),
  ADD UNIQUE KEY `RecipeID` (`RecipeID`),
  ADD KEY `fk_type` (`TypeID`),
  ADD KEY `fk_user` (`UserID`);

--
-- Indexes for table `recipetype`
--
ALTER TABLE `recipetype`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `IngredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ingredienttype`
--
ALTER TABLE `ingredienttype`
  MODIFY `IngredientTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `likedrecipes`
--
ALTER TABLE `likedrecipes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `RecipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `recipetype`
--
ALTER TABLE `recipetype`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contain`
--
ALTER TABLE `contain`
  ADD CONSTRAINT `FK_foringid` FOREIGN KEY (`IngredientID`) REFERENCES `ingredients` (`IngredientID`),
  ADD CONSTRAINT `fk_recpid` FOREIGN KEY (`RecipeID`) REFERENCES `recipes` (`RecipeID`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `FK_ingtype` FOREIGN KEY (`IngredientTypeID`) REFERENCES `ingredienttype` (`IngredientTypeID`);

--
-- Constraints for table `likedrecipes`
--
ALTER TABLE `likedrecipes`
  ADD CONSTRAINT `FK_likeR` FOREIGN KEY (`RecipeID`) REFERENCES `recipes` (`RecipeID`),
  ADD CONSTRAINT `FK_likedU` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `FK_likedUs` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`TypeID`) REFERENCES `recipetype` (`TypeID`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
