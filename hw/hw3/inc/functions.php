<?php
//includes API put together
include 'api/newsAPI.php';

function displayNavbar(){
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img class="logo" src="img/logo.png" />Courier Pigeon</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Headlines<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sports.php">Sports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="business.php">Business</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="technology.php">Tech</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="science.php">Science</a>
      </li>';
   echo' </ul></div></nav>';
   displayForm();
}

function displayHeadlines($category){

  getTopHeadlines($category);
}


function displayForm(){
  $_SESSION['pageSize'] = 20; //initialize page size to default
  $_SESSION['search'] = $_GET['search'];
  $_SESSION['lang'] = $_GET['lang'];
  $_SESSION['source'] = $_GET['source'];
  $_SESSION['pageSize'] = $_GET['pageSize'];
  $_SESSION['sort'] = $_GET['sort'];
  
  $search= '';
  $lang = '';
  $source = '';
  $pageSize = '20';
  $sort = '';
  
  if($_SESSION['search'] != ''){
    $search = $_SESSION['search'];
  }
  
  if($_SESSION['lang'] != ''){
    $lang = $_SESSION['lang'];
  }
  if($_SESSION['source'] != ''){
    $source = $_SESSION['source'];
  }
  if($_SESSION['pageSize'] != ''){
    $pageSize = $_SESSION['pageSize'];
  }
  if($_SESSION['sort'] != ''){
    $sort = $_SESSION['sort'];
  }
  
  $modal = '<button type="button" class="modalBtn glyphicon glyphicon-search" data-toggle="modal" data-target="#exampleModal">
  Search <div class="fa fa-search"></div>
</button><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
  <div class="row">
    <div class="col">
      <input name="search" type="text" class="form-control" placeholder="Search" value='. "$search" .'>
    </div>
    </div>' . getSources() .
    '
    <select  name="lang">
      <option value="en">English</option>
      <option value="es">Spanish</option>
      <option value="fr">French</option>
      </select>
      
      <select name="sort" placeholder="Sort By">
        <option value="">Sort By</option>
        <option value="publishedAt">Date</option>
        <option value="relevancy">Relevancy</option>
        <option value="popularity">Popularity</option>
        </select>
  
        <input placeholder="Number of Pages" class="numberInput" type="number" name="pageSize" min="10" max="100" value="'.$pageSize.'"></input>
    <input type="submit" class="form-control submitBtn" placeholder="Search">
    
</form>
      </div>
      <div class="modal-footer">
        Powered by NewsAPI
      </div>
    </div>
  </div>
</div>';

  echo $modal;
}

function getSearchResults(){
  if(isset($_GET['search'])){
    getSources();
    echo $form;
    $cat =  str_replace(' ', '', $_GET['search']);
    getNews($cat, $_GET['lang'], $_GET['source'], $_GET['sort'], $_GET['pageSize']);
  }
  elseif(isset($_GET['lang'])){
    getSources();
    echo $form;
    $cat =  str_replace(' ', '', $_GET['search']);
    getNews($cat, $_GET['lang'], $_GET['source'], $_GET['sort'], $_GET['pageSize']);
  }
  elseif(isset($_GET['source'])){
    getSources();
    echo $form;
    $cat =  str_replace(' ', '', $_GET['search']);
    getNews($cat, $_GET['lang'], $_GET['source'], $_GET['sort'], $_GET['pageSize']);
  }
  elseif(isset($_GET['sort'])){
    getSources();
    echo $form;
    $cat =  str_replace(' ', '', $_GET['search']);
    getNews($cat, $_GET['lang'], $_GET['source'], $_GET['sort'], $_GET['pageSize']);
    
  }
  elseif(isset($_GET['pageSize'])){
    getSources();
    echo $form;
    $cat =  str_replace(' ', '', $_GET['search']);
    getNews($cat, $_GET['lang'], $_GET['source'], $_GET['sort'], $_GET['pageSize']);
    
  }
  else{
    getSources();
    echo $form;
  }
}
?>
