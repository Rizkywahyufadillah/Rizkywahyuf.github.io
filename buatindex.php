<?php
session_start();  
require 'functions.php';


if(isset($_SESSION['login_designer'])){
  $email_designer=$_SESSION['email_designer'];
  $data_designer=mysqli_query($conn, "SELECT * FROM $tabledesigner WHERE email= '$email_designer'");
  $data=mysqli_fetch_array($data_designer);
  $profil='Profil-Designer.php';
}

elseif(isset($_SESSION['login_client'])){
  $username_client=$_SESSION['username_client'];
  $data_client=mysqli_query($conn, "SELECT * FROM client WHERE username= '$username_client'");
  $data=mysqli_fetch_array($data_client);
  $profil='Profil-Client.php';
}
else{
  $data_designer=mysqli_query($conn, "SELECT * FROM $tabledesigner WHERE id_designer= '1'");
  $data=mysqli_fetch_array($data_designer);
  $profil='Login.php';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Devote Design - Market for Your Design</title> 
  <!-- <link rel="stylesheet" href="css/index.css"> -->
  <link rel="icon" href="img/icon_logo.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <style>
    body{
      font-family: Helvetica,Arial,sans-serif;
      margin:0;
      background:#f1fdf7;
    }
    ul li{
      list-style: none; 
    }
    a{
      text-decoration: none;
    }

    /*container*/
    #container{
      margin: auto;
      width: 1349px;
    }
      header{
        position: fixed;
        width: 1349px;
        z-index: 3;
      }
      #navhead{
        display: flex;
        height: 83px;
      }
        .logo{
          margin-top:15px;
          margin-left: 15px;
          height: 60px;
        }
        .search{
          display: flex;
          height: 33px;
          margin-top: 25px;
          position: fixed;
          left: 185px;
          transition: top 0.3s;
          top: -90px;
        }
        .input_search{
          border: 1px solid grey;
          border-radius:  5px 0px 0px 5px;
          float: left;
          font-size: 15px;
          margin-left: 25px;
          padding: 10px;
          width: 275px;
          background: #f1f1f1;
          }
        .botton_search {
          border: 1px solid grey;
          border-left: none;
          border-radius:  0px 5px 5px 0px;    
          cursor: pointer;
          color: rgb(218, 218, 218);
          font-size: 15px;
          font-weight: 600;
          padding: 3px;
          width: 81px;
          background-color: rgb(6, 124, 0);
        }
          .botton_search:hover, #navhead li .login:hover, .header_search button:hover{
          background-color: rgb(1, 107, 0);
          color: rgb(218, 218, 218);
          cursor: pointer;
          }

        #navhead ul{
          display: flex;
          margin-left: auto;
          padding-top: 18px;
          width: 455px;
        }
        #navhead a{
          color: black;
          margin-right: 28px;
        }
          #navhead a:hover{
          color: rgb(100, 100, 100);
          }
        #navhead ul li:nth-child(1), #navhead ul li:nth-child(2){
          font-size: 15.5px;
          font-weight: 700;
        }
        #navhead .login{
          border-radius: 5px;
          color: rgb(218, 218, 218);
          font-size: 13px;
          font-weight: 800;
          text-decoration: none;
          padding: 8px 15px;
          background-color: rgb(6, 124, 0);
        }
        #navhead li img{
          border-radius: 21px;
          cursor:pointer;
          margin-top: -3px;
          height: 37px;
          width: 37px;
        }
        #profil_button:hover .profile{
          display:block;
        }
        #navhead .profile{
          border-radius: 5px;
          display:none;
          margin-left: -77px;
          margin-top: 1px;
          padding: 10px 15px;
          position:absolute;
          width:120px;
          background:#ccc;
          z-index:4;
        }
        #navhead .profile a{
            font: 15px/32px sans-serif;
            font-weight: 600;
        }
        #navhead .profile::before{
            content: " ";
            display: inline-block;
            height: 12px;
            margin-left: 75px;
            margin-top: -15px;
            position: absolute;
            transform: rotate(45deg);
            width: 12px;
            z-index: 2;
            background-color: #ccc;
        }

        #peringatan{
          background: #7288ad;
          display:none;
          font-size: 11.5px;
          padding: 8px 100px;
            width: 1349px;
        }

       /*Header*/
        #header{
          height: 425px;
          padding-top: 125px;
          padding-left: 125px;
          background-image: url(img/indexheader.jpg);
          background-size: cover;
        }
          #motto_header{
            height: 222px;
            line-height:41px;
            width: 632px;
          }
          #motto_header p{
          font-size: 35px;
          font-weight: 600;
          }

          .header_search input{
            border-radius:  5px 0px 0px 5px;
            border: 1px solid rgb(0, 230, 207);
            font-size: 16px;
            height: 41px;
            padding-left: 15px;
            width: 445px;
          }
          .header_search button{
            border-radius:  0px 5px 5px 0px;    
            border: 1px solid grey;
            color: rgb(218, 218, 218);
            font-size: 16px;
            font-weight: 700;
            height: 45px;
            margin-left: -5px;
            margin-top: -1px;
            line-height: 35px;
            width: 99px;
            background-color: rgb(6, 124, 0);
          }

      /*Main*/
      main{
          padding-bottom: 87px;
      }
         .judul_submain{
        font-size: 27px;
        text-align: center;
        }
          #container_categori{
            margin: auto;
            width: 815px;
            padding: 15px;
          }
          #container_categori h1{
            font-family: serif;
          }
            #categori{
              display: grid;
              grid-template-columns: 225px 225px ;
              justify-content: space-between;
              padding: 15px;
              width: 665px;
            }
            #categori div{
              margin-bottom: 55px;
            }
            #categori img{
              border: 2px solid #666;
              border-radius: 15px;
              height: 235px;
              width: 345px;
            }
            #categori div:hover img{
            transform: scale(1.05);
            opacity: 0.5;
            }
              #categori a p{
                color: black;
                font-size:23px;
                font-weight: 700;
                margin-top: -71px;
                margin-left: 25px;
              }


        /*How To Work*/
      #container_howtowork{
          padding:  35px 115px 110px 115px;
          text-align: center;
      }
        #howtowork{
          display: grid;
          grid-template-columns: 231px 231px 231px 231px;
          justify-content: space-between;
        }
          #howtowork .sekat{
            border-radius: 15px;
            padding:  35px 15px;
            background-color: rgb(11, 170, 170);
          }
            #howtowork .logo{
              border-radius: 185px;
              font-size: 61px;
              height: 78px;
              margin: auto;
              padding: 15px;
              width: 78px;
              background-color: white;
            }

       /*Kenapa*/
          #container_why{
            padding: 25px 122px;
          }
            #why{
              display: grid;
              font: 16px/19px Helvetica,Arial,sans-serif;
              grid-template-columns: 311px 311px 311px;
              justify-content: space-between;
            }
              #why .sekat{
                border-radius: 15px;
                padding:  35px 25px;
              }
              #why .logo{
                color: rgb(2, 118, 226);
                font-size: 71px;
                margin: auto;
                padding:  5px 15px 35px 15px;
                text-align: center;
              }

      /*Footer*/
      #container_footer{
        height: 455px;
        display: grid;
        grid-template-columns: 315px 315px 315px auto;
        justify-content: space-between;
        padding:  15px 125px;
        background-color: rgb(0, 9, 37);
      }
        #container_footer ul h2{
          color: white;
          font-size: 25px;
        }
        #container_footer ul a{
          color: #888;
          font:15.5px/35px sans-serif;
        }
        #container_footer ul a:hover{
        color: #666;
        }
        .container_sosmed{
            display: flex;
        }
        .sosmed {
          border-radius: 25px;
          cursor: pointer;
          height: 26px;
          margin-right: 8px;
          padding: 9px 12px;
          width: 20px;
          background-color: rgb(255, 236, 208);
        }
        .sosmed:hover{
        transform: scale(1.09);
        opacity: 0.8;
        }
          #container_footer .sosmed i{
            font-size: 23px;
              }
        /*copyright*/
          #copyright{
            color: rgb(255, 255, 255);
            font-size: 15px;
            height: 61px;
            text-align: center;
            padding-top: 18px;
            background-color: rgb(19, 0, 129);
          }
  </style>
</head>
<body>
  <div id="container">
    <!--Navhead-->
    <header>
      <div id="navhead">
        <a href="index.php"><img src="img/logo.png" alt="" class="logo"></a>
        <!--Form-->
        <form class="search" id="search" action="kategori.php" method="get">
            <input type="text" placeholder="Search.." name="kategori" class="input_search">
            <button type="submit" class="botton_search">Search</button>
        </form>
        <ul>
         <?php if(!isset($_SESSION['login_designer'])&&!isset($_SESSION['login_client'])&&!isset($_SESSION['SignUp_succes_client']) &&!isset($_SESSION['SignUp_succes_designer'])) :?>
            <li>
              <a href="Login-Designer.php" style="margin-left: 60px;" >Become a Designer</a>
            </li>
            <li>
              <a href="Login-Client.php">Sign In</a>
           </li>
           <li>
              <a href="Daftar.php" class="login">Register</a>
            </li>  
        <?php endif; ?> 
        <?php if(isset($_SESSION['login_designer']) || isset($_SESSION['SignUp_succes_designer'])) :?> 
          <li>
            <a href="Projek.php" style="margin-left: 110px;">List Projek</a>
          </li>

          <li>
            <a href="Create-Projek.php" class="login" style=" margin-right: 40px;">Create Projek</a>
          </li>
          <li id="profil_button">
            <img src=
                <?php if(empty($data['gambar'])){
                        echo '"Data/Avatar-default.jpg"';
                      }elseif(!empty($data['gambar'])){
                        echo 'Data/'.$data['gambar'];
                      }
               ?>>
            <div class="profile">
              <a href="<?=$profil?>">PROFIL</a><br>
              <a href="logout.php">LOGOUT</a>
            </div>
          </li>
        <?php endif; ?>
        <?php if(isset($_SESSION['login_client']) || isset($_SESSION['SignUp_succes_client'])) :?> 
          <li>
            <a href="Transaksi.php" class="login" style=" margin-left: 230px;margin-right: 40px;">Transaksi</a>
          </li>
          <li id="profil_button">
            <img src=
                <?php if(empty($data['gambar'])){
                        echo '"Data/Avatar-default.jpg"';
                      }elseif(!empty($data['gambar'])){
                        echo 'Data/'.$data['gambar'];
                      }
               ?>>
            <div class="profile">
              <a href="<?=$profil?>">PROFIL</a><br>
              <a href="logout.php">LOGOUT</a>
            </div>
          </li>
        <?php endif; ?>

        </ul>
      </div>
      <?php if(!isset($_SESSION['login_designer'])&&!isset($_SESSION['login_client'])&&!isset($_SESSION['SignUp_succes_client']) &&!isset($_SESSION['SignUp_succes_designer'])) :?>
        <div id="peringatan">
            <i class="fas fa-exclamation-circle"></i> Anda belum melakukan login. Silahkan <a href="Login">Login</a> untuk mendapatkan pengalaman yang luar biasa di Devotedesign. 
            </div>
        <?php endif; ?>
        <?php if($data['active'] ==0 && isset($_SESSION['login_designer']) OR $data['active'] ==0 &&isset($_SESSION['login_client']) OR $data['active'] ==0 &&isset($_SESSION['SignUp_succes_client']) OR $data['active'] ==0 &&isset($_SESSION['SignUp_succes_designer'])) :?>
            <div id="peringatan">
            <i class="fas fa-exclamation-circle"></i> Anda belum melakukan Aktivasi. Silahkan Aktivasi akun melalui email anda. 
            </div>
        <?php endif; ?>
    </header>
    
    <!--Header-->
    <div id="header">
      <div id="motto_header">
        <p>Find the best freelancers from around the world that you want</p>
          <form class="header_search" action="category.php" method="get">
            <input type="text" placeholder="Search.." name="category">
            <button type="submit">Submit</button>
          </form>
      </div>
    </div>

    <!-- Main -->
    <main>
      <!--Categori-->
        <div id="container_categori">
          <p class="judul_submain">Kategori Desain</p>
          <div id="categori">
            <div><a href="kategori.php?kategori=Desain Logo"><img src="img/kategori_logos.jpg" alt=""><p>Desain Logo</p> </a></div>
            <div><a href="kategori.php?kategori=Desain Kartu Nama"><img src="img/kategori_kartunama.png" alt=""><p>Kartu Nama</p> </a></div>
            <div><a href="kategori.php?kategori=Desain Poster"><img src="img/kategori_poster.jpg" alt=""><p>Desain Poster</p> </a></div>
            <div><a href="kategori.php?kategori=Desain Undangan"><img src="img/kategori_undangan.jpg" alt=""><p>Desain Undangan</p> </a></div>
            <div><a href="kategori.php?kategori=Desain Produk"><img src="img/kategori_produk.jpg" alt=""><p>Desain Produk</p> </a></div>
            <div><a href="kategori.php?kategori=Desain Aplikasi"><img src="img/kategori_mobile.jpg" alt=""><p>Desain Aplikasi</p> </a></div>
            <div><a href="kategori.php?kategori=Desain Kalender"><img src="img/kategori_kalenders.jpg" alt=""><p>Desain Kalender</p> </a></div>
            <div><a href="kategori.php?kategori="><img src="img/kategori_lainnya.jpg" alt=""><p>Lainnya</p> </a></div>
          </div>
        </div>
       <!--howtowork-->
         <div id="container_howtowork">
             <p class="judul_submain">Bagaimana Caranya Bekerja?</p>
            <div id="howtowork">
              <div class="sekat">
                <div class="logo">
                  <i class="fas fa-users"></i>
                </div>
                <p>Deskripsikan tentang Keahlian anda kepada kami. Kami akan mehubungkan anda dengan client didekat anda atau bahkan diseluruh dunia.</p>
              </div>
              <div class="sekat">
                <div class="logo">
                  <i class="fas fa-share-square"></i>
                </div>
                <p>Tawaran akan datang kepada anda ketika para client tertarik. Cari yang sesuai dengan kemampuan dan keinginan Anda.</p>
              </div>
              <div class="sekat">
                <div class="logo">
                  <i class="fas fa-comments"></i>
                </div>
                <p>Lakukan obrolan ataupun percakapan dengan client untuk mempermudah anda dalam mengerjakan proyek yang diminta.</p>
              </div>
              <div class="sekat">
                <div class="logo">
                  <i class="fas fa-credit-card"></i>
                </div>
                <p>Pembayaran akan diberikan ketika projek telah diterima client sehingga aka menjamin keamanan pembayaran.</p>
              </div>
            </div>
        </div>
      <!--Why-->
        <div id="container_why">
          <p class="judul_submain">Kenapa Devote Design?</p>
          <div id="why">
            <div class="sekat">
              <div class="logo">
                <i class="fas fa-user-tie"></i>
              </div>
              <h3>1. Freelancer Berkualitas</h3>
              <p>Kami menyediakan Freelancer berkualitas yang telah diseleksi sehingga akan mengerjakan pekerjaan andan dengan maksimal</p>
            </div>
            <div class="sekat">
              <div class="logo">
                <i class="fas fa-user-shield"></i>
              </div>
              <h3>2. Pembayaran Aman</h3>
              <p>Pembayaran anda tidak akan dikirim langsung ke freelancer sehingga akan menjamin keamanan transaksi</p>
            </div>
            <div class="sekat">
              <div class="logo">
                <i class="fas fa-money-check-alt"></i>
              </div>
              <h3>3. Pengembalian Uang</h3>
              <p>Pembayaran akan dikembalikan ketika freelancer tidak memenuhi perjanjian yang telah disepakati</p>
            </div>
          </div>
        </div>
    </main>


    <!--Footer-->
    <div id="footer">
      <div id="container_footer">
        <ul>
          <h2>Kategori</h2>
          <li><a href="kategori.php?kategori=Desain Logo">Desain Logo</a></li>
          <li><a href="kategori.php?kategori=Desain Kartu Nama">Desain Kartu Nama</a></li>
          <li><a href="kategori.php?kategori=Desain Website">Desain Website</a></li>
          <li><a href="kategori.php?kategori=Desain Produk ">Desain Produk</a></li>
          <li><a href="kategori.php?kategori=Desain Undangan">Desain Undangan</a></li>
          <li><a href="kategori.php?kategori=Desain Poster">Desain Poster</a></li>
          <li><a href="kategori.php?kategori=Desain Aplikasi">Desain Aplikasi</a></li>
          <li><a href="kategori.php?kategori=Desain Kalender">Desain Kalender</a></li>
        </ul>
        <ul>
          <br><br><br><br>
          <li><a href="kategori.php?kategori=Desain Katalog">Desain Katalog</a></li>
          <li><a href="kategori.php?kategori=Cover Buku">Cover Buku</a></li>
          <li><a href="kategori.php?kategori=Ilustrasi">Ilustrasi</a></li>
          <li><a href="kategori.php?kategori=Desain Cover Album">Desain Cover Album</a></li>
        </ul>
        <ul>
            <h2>Tentang</h2>
            <li><a href="Hubungi-Kami.php">Hubungi kami</a></li>
            <li><a href="Tentang-Kami.php">Tentang kami</a></li>
            <li><a href="Karir.php">Karir</a></li>
            <li><a href="Faq.php">FAQ</a></li>
        </ul>
        <ul>
          <h2>Sosial Media</h2>
          <li class="container_sosmed">
          <div class="sosmed"><a href="<?= $facebook?>"><i class="fab fa-facebook-f"></i></a> </div>
          <div class="sosmed"><a href="<?= $twitter?>"><i class="fab fa-twitter"></i></a> </div>
          <div class="sosmed"><a href="<?= $instagram?>"><i class="fab fa-instagram"></i></a> </div>
          </li>
        </ul>
      </div>
      <div id="copyright">
        <p>Devotedesign Copyrights &copy; 2020 - All rights reserved.</p>
      </div>
    </div>
  </div>
  
  <script>
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        document.getElementById("search").style.top = "0";
        document.getElementById("navhead").style.background = "linear-gradient(#ccc, #eee)";
        document.getElementById("peringatan").style.display = "inline-block";

      } else {
        document.getElementById("search").style.top = "-90px";  
        document.getElementById("navhead").style.background = "none";
        document.getElementById("peringatan").style.display = "none";
      }
    }

  </script>
</body>
</html>