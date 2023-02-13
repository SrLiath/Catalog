<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <meta charset="utf-8"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <style>
@media only screen and (max-width: 1050px) {       button {
        background-color: #4CAF50;
        color: white;
        padding: 7px 10px;
        margin: 1px;
        border: none;
        cursor: pointer;
        width: 100%;
        text-align: center;
      }
      
      button:hover {
        opacity: 0.8;
      }
      
      /* Add styles for the form */
      form {
        background-color: #f2f2f2;
        padding: 0px;
        text-align: center;
      }

      h2{
        max-width: 25ch;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  font-size:21px;
      }
}







.item {
      display: inline-block;
      width: 19%;
      margin: 1%;
      text-align: center;
    }


.icon-menu{

font-size: 20px;
float: left;
color: #21dee2;

}

.icon{
margin-right: 8px;
}



.vertical-menu {
  width: 200px; /* Set a width if you like */
}

.vertical-menu button {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
  width: 100px;
}

.vertical-menu button:hover {
  background-color: #ff5e14; 
  color: white;}


.vertical-menu {
    position: absolute;
    right: 0;
    background-color: none;
    padding: 10px;
    
  }
  .input-group {
  margin: auto;
  width: 25%;
  padding: 10px;
  justify-content: center;
}
.pagination {
  margin: auto;
  width: 25%;
  padding: 10px;
  justify-content: center;
}
  .btn:hover {
    background-color: #ff5e14;
    border-color: #ff5e14;
  }

  .items{
    padding: 10px;
  justify-content: center;
  }

  </style>
</head>
<body>


  



<!--mobile -->
  <div id="mb">
    <form action="" method="post">
    <input type="hidden" name="menu_option" value="">
    <button type="submit" value="">Todos</button>
    </form>
    <form action="" method="post">
    <input type="hidden" name="menu_option" value="1">
    <button type="submit" value="1">1</button>
    </form>
    <form action="" method="post">
    <input type="hidden" name="menu_option" value="2">
    <button type="submit" value="2">2</button>
    </form>
    <form action="" method="post">
    <input type="hidden" name="menu_option" value="3">
    <button type="submit" value="3">3</button>
    </form>
    <form action="" method="post">
    <input type="hidden" name="menu_option" value="4">   
    <button type="submit" value="4">4</button>
    </form>
    <form action="" method="post">
    <input type="hidden" name="menu_option" value="5">
    <button type="submit" value="5">5</button>
    </form>
    
    </form>
  </div>




<!--barra pesquisa-->
<div id="search" class="input-group">
  <form action="" method="post">
    <input type="text" id="search" name="search" maxlength="20">
    <input type="submit"  value="Filtrar">
  </form>
</div>


<!-- Codigo PHP -->
<?php
  $conn = mysqli_connect("localhost:5431", "root", "40028922.jj", "teste");
  $selected_category = '';
  //pesquisa
  if (isset($_POST['search'])) {
    $selected_category = $_POST['search'];
    $sql = "SELECT * FROM files WHERE name LIKE '%$selected_category%'";
    
  $total_items_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM files WHERE name LIKE '%$selected_category%'");
  }else{
    $sql = "SELECT * FROM files";
    $total_items_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM files");}
  
  
  //MENU
  if (isset($_POST['menu_option'])){ $selected_category = $_POST['menu_option'];
    $sql = "SELECT * FROM files WHERE description LIKE '%$selected_category%'";
    $total_items_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM files WHERE description LIKE '%$selected_category%'");
  }
  
  $result = mysqli_query($conn, $sql);

  $total_items_result = mysqli_fetch_assoc($total_items_query);
  $total_items = $total_items_result['total'];

// Definindo a quantidade de itens por página
$items_per_page = 4 * 6;

// Cálculo do número total de páginas
$total_pages = ceil($total_items / $items_per_page);


  if (!isset($_GET['page'])) {
    $current_page = 1;
  } else {
    $current_page = $_GET['page'];
  }

  $start = ($current_page - 1) * $items_per_page;

  $items_query = mysqli_query($conn, "$sql LIMIT $start, $items_per_page");
?>




<!-- Produtos -->
<div id="items" class="items">
  <!-- Menu -->
<div class="vertical-menu" id="vertical-menu">
<form action="?page=1" method="post">
    <input type="hidden" name="menu_option" value="">
    <button type="submit">Todos</button>
  </form>
  <form action="?page=1" method="post">
    <input type="hidden" name="menu_option" value="1">
    <button type="submit">1</button>
  </form>

  <form action="?page=1" method="post">
    <input type="hidden" name="menu_option" value="2">
    <button type="submit">2</button>
  </form>

  <form action="?page=1" method="post">
    <input type="hidden" name="menu_option" value="3">
    <button type="submit">3</button>
  </form>

  <form action="?page=1" method="post">
    <input type="hidden" name="menu_option" value="4">
    <button type="submit">4</button>
  </form>

  <form action="?page=1" method="post">
    <input type="hidden" name="menu_option" value="5">
    <button type="submit">5</button>
  </form>
</div>
  <?php
    while ($item = mysqli_fetch_assoc($items_query)) {
      echo '<div class="item">';
      echo '<img class="js" src="' . $item['image'] . '" alt="' . $item['name'] . '"  style="heigth:50px; width: 150px;" data-toggle="modal" data-target="#itemModal" data-name="' . $item['name'] . '" data-description="' . $item['description'] . '" data-image="' . $item['image'] . '">';
      echo '<h2>' . $item['name'] . '</h2>';
      echo '<p style="display:none">' . $item['id'] . '</p>';
      echo '</div>';
    }
  ?>
</div>


<!-- Indice -->
  <div id="pagination" class="pagination">
    <?php
      for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
          echo '<span>(' . $i . ')</span> ';
        } else {
          echo '<a href="?page=' . $i . '">ㅤ' . $i . 'ㅤ</a> ';
        }
      }
    ?>
  </div>


  <!-- PopUp -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 715px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex">
        <img id="modal-img" src="" alt="" style="width: 500px; height: auto; object-fit: contain;">
        <div style="width: 100%; margin-left: 20px;">
          <div id="modal-button" style="text-align: left; margin-top: 20px;"></div>
        </div>
      </div>    

      <p id="modal-description" style="margin-top: 20px; padding-left:15px;"></p>

</div>

    </div>
  </div>
</div>




            
<!-- Js script -->
              <script>
                function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
  //responsividade
if (window.matchMedia("(min-width:1050px)").matches) {
  /* a viewport tem pelo menos 800 pixels de largura */
  var node = document.getElementById("mb").remove();
  console.log('a viewport tem pelo menos 800 pixels de largura')
} else {
  /* a viewport menos que 800 pixels de largura */
  var node = document.getElementById("vertical-menu").remove();
  
}

    $(document).ready(function() {
    $('.item .js').click(function() {
    let name = $(this).data('name');
    let description = $(this).data('description');
    let image = $(this).data('image');
    let id = $(this).siblings('p').text();

    $('#exampleModalLabel').text(name);
    $('#modal-img').attr('src', image);
    $('#modal-description').text(description);
    $('#modal-button').text('ID: ' + id);
    $.ajax({
      type: "POST",
      url: "my_page.php",
      data: { id: id }
    }).done(function(response) {
      console.log(response);
      // aqui você adiciona o código para criar os botões dinamicamente
      let buttonData = response.split(";");
      let numButtons = buttonData[0];
      let buttonNames = buttonData[1].split(",");
      let buttonLinks = buttonData[2].split(",");
      let buttonHTML = "";
      for (let i = 0; i < numButtons; i++) {
        buttonHTML += "<a href='" + buttonLinks[i] + "' class='btn btn-primary'>" + buttonNames[i] + "</a>&nbsp;";
      }
      $('#modal-button').html(buttonHTML);
    });
  });
});
                 $(document).ready(function() {
    $('.js').click(function() {
      $('#exampleModalLabel').text($(this).data('name'));
      $('#modal-description').text($(this).data('description'));
      $('#modal-img').attr('src', $(this).attr('src'));
      $('#exampleModal').modal('show');
      $('#itemName').text(name);
      $('#itemDescription').text(description);
      $('#itemImage').attr('src', image);
    });
  });
              $(document).ready(function() {
                $(".popup-link").click(function() {
                  $("#modalTitle").text($(this).data("name"));
                  $("#modalImage").attr("src", $(this).data("image"));
                  $("#modalDescription").text($(this).data("description"));
                  $("#imageModal").modal("show");
                });
              });
              </script>
              </body>
              </html>
