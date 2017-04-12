<?PHP
require __DIR__ . "/../db_connect.php";
require_once "../Input.php";

function pageController($dbc) {
    
    $data = [];
    $data['offset'] = 0;

    if (Input::has("offset")) {
        $data['offset'] = Input::get("offset");
    }else{
        $data['offset'] = 0;
    }

    $data['select'] = "SELECT * FROM national_parks LIMIT 5 OFFSET {$data['offset']}";
    $data['statement'] = $dbc->query($data['select']);

    $data['parks'] = $data['statement']->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

extract(pageController($dbc));
?>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>National Parks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/park.css">
    
</head>


<body>
    <div class="container-fluid" id="coverContainer">
        <div class="col" id="cover">
            <div class="centerAbsolute">
                <h1 id="coverText">National Forest</h1>
                <h1 id="coverSubText">Archive</h1>
            </div>
        </div>

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">NFA</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Park Name</th>
                            <th>Location</th>
                            <th>Date Established</th>
                            <th>Area (in acres)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP foreach ($parks as $park) : ?>
                        <tr>
                            <td><?= $park['id'] ?></td>
                            <td><?= $park['name'] ?></td>
                            <td><?= $park['location'] ?></td>
                            <td><?= $park['date_established'] ?></td>
                            <td><?= $park['area_in_acres'] ?></td>
                        </tr>
                        <?PHP endforeach; ?>
                    </tbody>
                </table> 
                <a class="btn btn-outline-primary" href="http://codeup.dev/national_parks.php?offset=<?= $offset - 5 ?>" role="button">Back</a>
                <a class="btn btn-outline-primary" href="http://codeup.dev/national_parks.php?offset=<?= $offset + 5 ?>" role="button">Forward</a>

            </div>
        </div>
    </div>



<script src="/js/jquery-3.1.1.min.js"</script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>