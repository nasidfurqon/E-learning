<div class="head border-dark fs-4 border-bottom">
    <p >Class</p>
</div>

<div class="greeting mt-4">
  <p>Here are some classes available for you.</p>
</div>

<!-- Card --> 
<div class="row row-cols-1 pt-2 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <div class="bg card-img-top text-light d-flex">
        <div class="name p-3">
          <a href="index.php?page=in-class" class="fs-3 text-light text-decoration-none">Lorem ipsum dolor sit amet.</a>
        </div>
        <div class="list m-3 me-4 mt-4">
          <p onclick="colOnClickMenu()" onmouseenter="colOnMouse(this)" onmouseleave="colOffMouse(this)" class="colon fa-solid fa-ellipsis-vertical text-light fa-xl float-end text-decoration-none mt-3"></p>
          <ul id="list-colon" class="list-colon list-unstyled border border-2 rounded-start rounded-end bg-light text-dark me-2">
            <li class="ps-2 pt-2 pe-2 list-colon-menu">Edit</li>
            <li class="p-2 list-colon-menu">Delete</li>
          </ul>
        </div>
      </div>
      <div class="card-body">
        <p >Tenggat</p>
        <a href="/index.php?page=assignment" class="hw card-title fs-3 text-decoration-none">Homework</a>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
</div>
</script>