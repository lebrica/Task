<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <header>
      <div class="container">
          <div class="row">
              <div class="col-md-8"><h2>Tasks</h2></div>
              <div class="col-md-4"><?php if (isset($_SESSION['name'])): ?><a href="../logout">logout</a>
                                                            <?php else:?><a href="../auth">auth</a></div><?php endif;?>
          </div>
      </div>
  </header>
   <div class="container">
       <div class="row">
           <div class="task">
               <?php foreach ($tasksView as $task): ?>
                    <p><?php echo $task['name'] ?></p>
                    <p><?php echo $task['email'] ?></p>
                    <p><?php echo $task['task'] ?></p>
                    <?php if ($task['status'] == 1):?>
                   <p><strong>Выполено</strong></p>
                    <?php else:?>
                    <p><strong>Не выполено</strong></p>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['name'])): ?>
                           <a href="../checktask=<?php echo $task['id']?>">проверенно</a>
                           <a href="../changetask=<?php echo $task['id']?>">редактировать</a>
                    <?php endif; ?>

               <p>-------------------------------------------------</p>
               <?php endforeach; ?>
           </div>
           <div class="container">
               <div class="new-task">
                   <form action="../addtask" method="post">
                       <input type="text" name="name">
                       <input type="email" name="email">
                       <textarea type="text" name="task" rows="3"></textarea>
                       <button type="submit" name="submit">Add Task</button>
                   </form>
               </div>
               <div class="navigate">
                <?php for ($i = 1; $i <= $pagesCount; $i++):?>
                   <a href="page=<?php echo $i?>" <?php if ($page == $i): ?>class="text-danger"<?php endif;?> ><?php echo $i ?></a>
               <?php endfor; ?>
               </div>
           </div>
       </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>