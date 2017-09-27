<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Product Price</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="col">
                <h3>PChome</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pchome as $item): ?>
                        <tr>
                            <td><a href="<?php echo $item['link'] ?>"><img width="100" src="<?php echo $item['image'] ?>"/></a></td>
                            <td><a href="<?php echo $item['link'] ?>"><?php echo $item['name'] ?></a></td>
                            <td>$ <?php echo $item['price'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h3>MOMO</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($momo as $item): ?>
                        <tr>
                            <td><a href="<?php echo $item['link'] ?>"><img width="100" src="<?php echo $item['image'] ?>"/></a></td>
                            <td><a href="<?php echo $item['link'] ?>"><?php echo $item['name'] ?></a></td>
                            <td>$ <?php echo $item['price'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h3>Yahoo</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($yahoo as $item): ?>
                        <tr>
                            <td><a href="<?php echo $item['link'] ?>"><img width="100" src="<?php echo $item['image'] ?>"/></a></td>
                            <td><a href="<?php echo $item['link'] ?>"><?php echo $item['name'] ?></a></td>
                            <td>$ <?php echo $item['price'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h3>Books</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($books as $item): ?>
                        <tr>
                            <td><a href="<?php echo $item['link'] ?>"><img width="100" src="<?php echo $item['image'] ?>"/></a></td>
                            <td><a href="<?php echo $item['link'] ?>"><?php echo $item['name'] ?></a></td>
                            <td>$ <?php echo $item['price'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
