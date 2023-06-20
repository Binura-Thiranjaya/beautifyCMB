<style>
.container {
  max-width: 1200px;
  margin: 0 auto;
}

.row {
  display: flex;
}

.col-6 {
  flex: 1;
}

.image-container {
  width: 100%;
  height: 0;
  padding-bottom: 60%;
  position: relative;
}

.image-container img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

@media (max-width: 768px) {
  .row {
    flex-wrap: wrap;
  }
  .col-6 {
    width: 100%;
  }
}

</style>
<!DOCTYPE html>
<html>
<head>
  <title>My Single Page</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="image-container">
          <img src="image1.jpg" alt="Column 1 Image">
        </div>
        <h1>Column 1</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum euismod augue, ut congue nisl sollicitudin non. Curabitur id mauris auctor, pharetra nisi in, malesuada est. Sed tincidunt, risus at pharetra suscipit, metus metus bibendum velit, vel hendrerit elit augue vel est.</p>
      </div>
      <div class="col-6">
        <div class="image-container">
          <img src="image2.jpg" alt="Column 2 Image">
        </div>
        <h1>Column 2</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum euismod augue, ut congue nisl sollicitudin non. Curabitur id mauris auctor, pharetra nisi in, malesuada est. Sed tincidunt, risus at pharetra suscipit, metus metus bibendum velit, vel hendrerit elit augue vel est.</p>
      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>
