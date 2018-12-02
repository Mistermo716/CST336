/* global store, api, index */
'use strict';

const bookList = (function(){
  
  function generateItemElementCon(item) {

    let version = 1;
    let starItemVar = starItem(item.rating);
    

    return `<li class = "li-mark card" data-item-star="${item.rating}" data-item-url="${item.url}" data-item-desc="${item.desc}" data-item-title="${item.title}" data-item-id="${item.id}"><div class ="container1">
      <div class ="container2">
      <h5 class ="title-mark">${item.title}</h5>
      <h6>Rating</h6>
      <span style="text-align: center">
      ${starItemVar}
      </span>
      <button style="float:right; margin:5px" class ="dltBtn btn-danger btn" type="button">Delete Mark</button>
      <button style="float:right; margin:5px" class ="expBtn btn btn-secondary" type="button">Expand</button> </span>
      </div>
  </div></li> `;

  }
  function generateItemElementExp(title, id, desc, url, star){
    let version = 2;
    let starItemVar = starItem(star);
    return `<li class ="card">
      <div class ="expand-container2">
      <h5 class ="card-header">${title}</h5>
      <div class="card-body">
      <h5>Rating</h5>
      <span class ="expStar">${starItemVar}</span>
      <h5 class="description-heading">Description</h5>
      <p class="card-text description-expand">${desc}</p>
      <a style="margin:2px" class ="btn btn-primary" href="${url}">Link To Page</a>
      <button style="margin:2px; float:right" type="button" class="conBtn float-left btn btn-secondary">Condense Mark</button>
      <button style="margin:2px; float:right" class ="dltBtn btn-danger btn" type="button">Delete Mark</button>
      </div>
      </div>
  </li>`;

  }
  function starItem(item){
    let starItem = '';
    // if(version === 1)
    //   {
      if (item === 1) {
        starItem  = '<span value="1" class="fa fa-star star star1 checked"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span>';
      }
      else if (item === 2){
        starItem  = '<span value="2" class="fa fa-star star star1 checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span>';
      }
      else if (item === 3)
      {
        starItem  = '<span value="3" class="fa fa-star star star1 checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span>';
      }
      else if (item === 4){
        starItem  = '<span value="4" class="fa fa-star star star1 checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star"></span>';
      }
      else if (item === 5) {
        starItem  = '<span value="5" class="fa fa-star star star1 checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star checked"></span> <span class="fa fa-star star checked"></span>';
      }
      else{
        starItem = '<span value="0" class="fa fa-star star star1"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span> <span class="fa fa-star star"></span>';
      }
    return starItem;
  }
   
  function generateBookItemString(bookList){
    const items = bookList.map((item) => generateItemElementCon(item));
    console.log(bookList);
    return items.join(' ');
  }
  // function generateBookItemStringExp(bookList, id){
    
  //   if (item.id === id){
  //   const item = bookList.map(item) => generateItemElementExp(item));
  //   }
  // }
  function render(){
    console.log('render ran');
    let items;
    if($('.star-filter').val() > 0){
      items = store.items.filter(item=>item.rating == $('.star-filter').val());
      }
      else{
    items = store.items;
      }
    const BookListItemsString = generateBookItemString(items);

    $('.ul-mark').html(BookListItemsString);
  }
  function handleNewItemSubmit(){
    $('.add-button').click(function(event){
      event.preventDefault();
      console.log('newItemSubmit ran!');
      const newItemTitle = $('.title-sub').val();
      const newItemURL = $('.link-sub').val();
      const newRating = $('.star-sub').val();
      const newDescription = $('.desc-sub').val();
      const curItem = item.create(newItemTitle,newItemURL,newDescription,newRating);
      $('description-sub').val('Description');
      $('.link-sub').val('Link To Page');
      $('.title-sub').val('Title');
      api.createItem(curItem, (newItem)=>
      {
        store.addItem(newItem);
        render();
      });
    });
  }

    function handleExpandItem(){
      $('ul').on('click','li .expBtn' ,function(event){
        event.preventDefault();
        console.log('expand clicked');
        const title = $(event.currentTarget).closest('.li-mark').data('item-title');
        const id = $(event.currentTarget).closest('.li-mark').data('item-id');
        const desc = $(event.currentTarget).closest('.li-mark').data('item-desc');
        const url = $(event.currentTarget).closest('.li-mark').data('item-url');
        const star = $(event.currentTarget).closest('.li-mark').data('item-star');
        api.getItems((item)=>{
          const result = item.filter(item => item.id === id); 
          const expandedVersion = generateItemElementExp(title, id, desc, url, star);
          console.log(expandedVersion);
          $(event.currentTarget).closest('.li-mark').html(expandedVersion);



        });

        

      });

    }

    function handleCondensedItem(){
      $('ul').on('click','li .conBtn' ,function(event){
        event.preventDefault();
        console.log('expand clicked');
        const title = $(event.currentTarget).closest('.li-mark').data('item-title');
        const id = $(event.currentTarget).closest('.li-mark').data('item-id');
        const desc = $(event.currentTarget).closest('.li-mark').data('item-desc');
        const url = $(event.currentTarget).closest('.li-mark').data('item-url');
        const star = $(event.currentTarget).closest('.li-mark').data('item-star');
        const objCon = {
          title,
          id,
          desc,
          url,
          rating: star
        };
        api.getItems((item)=>{
          const result = item.filter(item => item.id === id); 
          const conVersion = generateItemElementCon(objCon);
          console.log(conVersion);
          $(event.currentTarget).closest('.li-mark').html(conVersion);



        });

        

      });

    }

    function handleDeleteItem(){
      $('ul').on('click','li .dltBtn',(event)=>{
        event.preventDefault();
       const id = $(event.currentTarget).closest('.li-mark').data('item-id');
       console.log(id);
       api.deleteItem(id, ()=>{
        store.findAndDelete(id);
        render(); 
       });

      });
    }
    function handleFilterItem(){
      $('.Filter').on('click', '.filter-btn', (event)=>{

        event.preventDefault();
        render();
        
      });
    }

    function bindEventListeners(){
      handleNewItemSubmit();
      handleExpandItem();
      handleDeleteItem();
      handleCondensedItem();
      handleFilterItem();
    }




  return {
    bindEventListeners,
    generateItemElementCon,
    generateItemElementExp,
    starItem,
    render

  };
}());