
@php


use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\PostAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
$compteur_age=0;
        $count_users=User::all()->count();
        $users=User::all();
        $comments=Comment::all()->count();
        $posts=Post::all()->count();
        $categorys=Category::all()->count();
        $likes=Like::all()->count();

        foreach($users as $item){
            $user_birth= $item->birth_date;
  
            // Create a new Carbon instance from the date
            $carbon = new Carbon($user_birth);
            // Calculate the difference in years between the date and the current date
            $years = $carbon->diffInYears();
            $compteur_age+=$years;
            // nombre de commenatires de l'utilisateur
  
             
         }
         $moyenne_age=$compteur_age/$count_users;
         $moyenne_commentaires= round($comments/$count_users,2);
         
         $moyenne_commentaires_par_post=round($comments/$posts,2);
         $moyenne_commentaires_par_category=round($comments/$categorys,2);
         $moyenne_likes_par_post=round($likes/$posts,2);
         $moyenne_likes_par_commentaire=round($likes/$comments,2);
        


@endphp


@extends('layouts.master')

@section('content')





        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
<div>
    <p></p>
</div>
            <!-- Content Row -->
            <div class="row">

                  <!-- Earnings Users Enregistrés -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger  text-uppercase mb-1">
                                        Nombre d'utlisateurs enregistrés</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_users}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings Users moyenne âge -->
                       <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Moyenne d'âge des utilisateurs</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$moyenne_age}} ans</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Earnings Moyenne Posts -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Moyenne Commentaires par Post</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$moyenne_commentaires_par_post}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings Post Par Catégorie -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Moyenne de Post par Categorie</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$moyenne_commentaires_par_category}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Exampl-->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Moyenne des Likes par commentaire
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$moyenne_likes_par_commentaire}}</div>
                                        </div>
                                        {{-- <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 50%" aria-valuenow="10" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <progress value="19" max="90">
                                            </progress>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    {{-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> --}}
                                    <i class="fa fa-thumbs-up fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Moyenne de likes par Categorie</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fa fa-thumbs-up fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->


            
            <!-- Nav Item -  Collapse Menu  Statistiques par jour-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Statistiques par Jour</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Choissisez une date:</h6>
                         <input type="date" id='date' class='collapse-item' onchange="getKpiperDay()" >
                    </div>
                    
                </div>
            </li>

            <ul class="list-group">
                <li id="day" class="list-group-item  d-flex justify-content-between align-items-center">
                  Day
                  <span id="day" class="badge bg-primary rounded-pill"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Utilisateurs enregistrés
                  <span id='users' class="badge bg-danger rounded-pill "></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                 Post crées
                  <span id='posts' class="badge bg-primary rounded-pill"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Comments crées
                    <span id='comments' class="badge bg-primary rounded-pill"></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Likes
                    <span id='likes' class="badge bg-primary rounded-pill"></span>
                  </li>
              </ul>
              <br>

{{-- ----------List utilisateurs ---------------- --}}



              <ul class="list-group">
                <li id="day" class="list-group-item bg-primary text-light d-flex justify-content-between align-items-center">
                  Utilisateurs Enregistrés
                  <span id="day" class="badge bg-primary rounded-pill"></span>
                </li>
                <?php $users=User::all(); ?>
                @foreach ($users as $value)
                <?php 
                $name=$value->name;
                $email=$value->email;
                $id=$value->id;
                $posts=$value->posts->count();
                $comments=$value->comments->count();
                $created_at=$value->created_at;
                $likes=$value->likes;
              
                ?>

                <br>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                   Nom d'utilisateur
                  <span id='users' class="badge bg-primary rounded-pill ">{{$name}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Email
                    <span id='users' class="badge bg-success rounded-pill ">{{$email}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Crée le
                    <span id='users' class="badge bg-info rounded-pill ">{{$created_at}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Posts
                    <span id='users' class="badge bg-warning rounded-pill ">{{$posts}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Commentaires
                    <span id='users' class="badge bg-secondary rounded-pill ">{{$posts}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Likes
                    <span id='users' class="badge bg-secondary rounded-pill ">{{$likes}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <form method='post' action="{{route('user_delete')}}" class="w-28">
                    @csrf
                    <button name=user_id value={{$id}} href="" class="btn btn-danger" type="submit">Effacer utilisateur</button>
                </form> 
                </li>
                
                  
                  <br>

              @endforeach
              </ul>
              <br>

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Registered users</h6>
                            {{-- <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Daily Activity</h6>
                            {{-- <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Nombre Post
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Nombre commentaire
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Nombre like
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row d-none">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="small font-weight-bold">Server Migration <span
                                    class="float-right">20%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Sales Tracking <span
                                    class="float-right">40%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Customer Database <span
                                    class="float-right">60%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Payout Details <span
                                    class="float-right">80%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Account Setup <span
                                    class="float-right">Complete!</span></h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Color System -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary text-white shadow">
                                <div class="card-body">
                                    Primary
                                    <div class="text-white-50 small">#4e73df</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    Success
                                    <div class="text-white-50 small">#1cc88a</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-info text-white shadow">
                                <div class="card-body">
                                    Info
                                    <div class="text-white-50 small">#36b9cc</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-warning text-white shadow">
                                <div class="card-body">
                                    Warning
                                    <div class="text-white-50 small">#f6c23e</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-danger text-white shadow">
                                <div class="card-body">
                                    Danger
                                    <div class="text-white-50 small">#e74a3b</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-secondary text-white shadow">
                                <div class="card-body">
                                    Secondary
                                    <div class="text-white-50 small">#858796</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-light text-black shadow">
                                <div class="card-body">
                                    Light
                                    <div class="text-black-50 small">#f8f9fc</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-dark text-white shadow">
                                <div class="card-body">
                                    Dark
                                    <div class="text-white-50 small">#5a5c69</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 mb-4">

                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                    src="img/undraw_posting_photo.svg" alt="...">
                            </div>
                            <p>Add some quality, svg illustrations to your project courtesy of <a
                                    target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                constantly updated collection of beautiful svg images that you can use
                                completely free and without attribution!</p>
                            <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                unDraw &rarr;</a>
                        </div>
                    </div>

                    <!-- Approach -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                        </div>
                        <div class="card-body">
                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                CSS bloat and poor page performance. Custom CSS classes are used to create
                                custom components and custom utility classes.</p>
                            <p class="mb-0">Before working with this theme, you should become familiar with the
                                Bootstrap framework, especially the utility classes.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection



<script>

    function getKpiperDay(){
        var date = document.getElementById('date').value;
        getdata(date);
      
    }

    function getdata(date){
            let day=document.getElementById('day');
            let users=document.getElementById('users');
            let posts=document.getElementById('posts');
            let comments=document.getElementById('comments');
            let likes=document.getElementById('likes');

            var myHeaders = new Headers();
            myHeaders.append("accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch("http://127.0.0.1:8000/api/getdataperday?date="+date, requestOptions)
            .then(response => response.json())
            .then(result => {
                
                console.log(result);
                console.log(result.date)
                day.innerHTML=result.date;
                users.innerHTML=result.users;
                posts.innerHTML=result.posts;
                comments.innerHTML=result.comments;
                likes.innerHTML=result.likes;




                
            })
            .catch(error => console.log('error', error));
                    }
    
</script>