<main ng-controller="addListingCtrl.js">

<!-- 
<html>
  <head> 
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  </head>
  <body> -->
    <!--header bar here -->
    <form action="../static/php/addlisting.php" method="post">
      Item Name: <br />
        <input type="text" name="itemName"><br />
      
      Item Type: <br />
        <input id="bookButton" type="radio" name="itemType" value="book" onclick="showISBN();" required> Book <br />
        <input id ="furnitureButton" type="radio" name="itemType" value="furniture" onclick="noShowISBN();" required> Furniture <br />
        <input id="otherButton" type="radio" name="itemType" value="other" onclick="noShowISBN();" required> Other <br />
      
      <div id="isbn" style="display:none;"> ISBN Number: <br /> <!-- Hidden with JS unless book is selected -->
        <input type="text" name="ISBN" maxlength="13" size="13"><br />
      </div>

      <div id="price""> Price: <br /> <!-- Hidden with JS unless book is selected -->
        <input type="text" name="price" maxlength="10" size="10"><br />
      </div>

      Item Description: <br />
             <textarea id=itemDescription" rows=10 cols=50" placeholder="Item description goes here..." required></textarea> <br />
      <input type="submit" name="submitButton"> <br />
     </form>

    <!--add footer bar here (?) -->
<!--
  </body>
  </html> 
-->
</main>