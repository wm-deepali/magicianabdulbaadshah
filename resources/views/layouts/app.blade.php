<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title', 'Magician Abdul Baadshah | Kids Magic Shows & Event Planning')</title>

  <meta name="description" content="Professional magician for kids' birthday parties, school events & family celebrations. Amazing magic shows that delight children of all ages!">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

  <!-- lightGallery -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/css/lightgallery-bundle.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2/css/lg-thumbnail.min.css">

  <!-- ✅ YOUR CSS PATH -->
  <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"/>
<style>
/* ========================= */
/* GALLERY TAB BUTTONS */
/* ========================= */

.gallery-tabs{
    display: inline-flex;
    align-items: center;
    background: #fff;
    padding: 8px;
    border-radius: 70px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    gap: 10px;
}

.tab-btn{
        border: none !important;
    background: transparent !important;
    color: #111827 !important;
    font-size: 16px;
    font-weight: 700;
    padding: 10px 24px !important;
    border-radius: 60px !important;
    transition: 0.35s ease;
    position: relative;
}


.tab-btn i{
    margin-right: 10px;
    transition: 0.35s ease;
}

/* ACTIVE BUTTON */

.tab-btn.active{
    background: linear-gradient(135deg,#7c3aed,#ec4899) !important;
    color: #fff !important;
    box-shadow: 0 10px 25px rgba(124,58,237,0.25);
}

/* HOVER */

.tab-btn:hover{
    background: #f3f4f6 !important;
}

/* ACTIVE HOVER */

.tab-btn.active:hover{
    background: linear-gradient(135deg,#7c3aed,#ec4899) !important;
}

/* RESPONSIVE */

@media(max-width:768px){

    .gallery-tabs{
        width: 100%;
        justify-content: center;
    }

    .tab-btn{
        flex: 1;
        font-size: 16px;
        padding: 14px 20px !important;
    }

}

.magic-about-content {
    padding:23px !important;
}
.magic-about-content h4{
    margin-top: 0px!important;
}
.hero-slider{
    position: relative;
    width: 100%;
   
    overflow: hidden;
    line-height: 0; /* IMPORTANT */
}

.hero-slide{
    position: absolute;
    inset: 0;
}
.hero-section {
    position: relative;
    height: 60vh;
    min-height: 450px;
    padding:0;
    display: flex;
    align-items: center;
    overflow: hidden;
}
.hero-slide img{
    width: 100%;
    height: 100%;
      
    display: block; /* IMPORTANT */
}
@media(max-width:576px){

.hero-slide img{
        width: 100%;
       height: auto !important;
       
    }
    .hero-section {
  
    min-height: 153px !important;
    
}
.hero-slide img{
        width: 100%;
        height: auto !important;
        object-fit: contain;
    }

}
@media(max-width:769px){

  

    .hero-slide img{
        width: 100%;
        height: 100%;
       
    }

}


/* ========================= */
/* ABOUT SECTION */
/* ========================= */

.magic-about-section{
    padding: 100px 0;
    background: linear-gradient(to bottom,#ffffff,#f8f5ff);
    position: relative;
    overflow: hidden;
}

/* BACKGROUND SHAPES */

.magic-about-section::before{
    content: "";
    position: absolute;
    width: 500px;
    height: 500px;
    background: rgba(124,58,237,0.08);
    border-radius: 50%;
    top: -200px;
    left: -200px;
    filter: blur(100px);
}

.magic-about-section::after{
    content: "";
    position: absolute;
    width: 400px;
    height: 400px;
    background: rgba(236,72,153,0.08);
    border-radius: 50%;
    bottom: -150px;
    right: -150px;
    filter: blur(100px);
}


/* ========================= */
/* HEADING */
/* ========================= */

.magic-about-heading{
    text-align: center;
    margin-bottom: 70px;
    position: relative;
    z-index: 2;
}

.magic-about-tag{
    display: inline-block;
    padding: 10px 24px;
    border-radius: 50px;
    background: rgba(124,58,237,0.08);
    color: #7c3aed;
    font-weight: 700;
    margin-bottom: 18px;
}

.magic-about-heading h2{
    font-size: 52px;
    font-weight: 800;
    color: #111827;
    margin-bottom: 15px;
}

.magic-about-heading h2 span{
    background: linear-gradient(90deg,#7c3aed,#ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.magic-about-heading p{
    color: #6b7280;
    font-size: 18px;
    max-width: 700px;
    margin: auto;
}


/* ========================= */
/* IMAGE CARD */
/* ========================= */

.magic-about-image-box{
    position: relative;
    border-radius: 30px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,0.12);
    height: 100%;
    background: #fff;
}

.magic-about-image-box img{
    width: 100%;
    height: 100%;
    min-height: 600px;
    object-fit: cover;
    transition: 0.5s ease;
}

.magic-about-image-box:hover img{
    transform: scale(1.05);
}

.magic-about-image-overlay{
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 35px;
    background: linear-gradient(to top,rgba(0,0,0,0.8),transparent);
    color: #fff;
}

.magic-about-image-overlay h4{
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 10px;
}

.magic-about-image-overlay p{
    margin: 0;
    color: rgba(255,255,255,0.85);
}


/* ========================= */
/* CONTENT BOX */
/* ========================= */

.magic-about-content{
    background: #fff;
    border-radius: 30px;
    padding: 50px;
    height: 100%;
    box-shadow: 0 20px 60px rgba(0,0,0,0.08);
    position: relative;
    z-index: 2;
}

.magic-about-content h3{
    font-size: 34px;
    font-weight: 800;
    color: #111827;
    margin-bottom: 20px;
}

.magic-about-content h4{
    font-size: 24px;
    font-weight: 700;
    color: #7c3aed;
    margin-top: 35px;
    margin-bottom: 15px;
}

.magic-about-content p{
    color: #6b7280;
    line-height: 1.9;
    font-size: 16px;
}


/* ========================= */
/* BUTTON */
/* ========================= */

.magic-about-btn{
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-top: 40px;
    padding: 16px 36px;
    border-radius: 60px;
    text-decoration: none;
    color: #fff;
    font-weight: 700;
    background: linear-gradient(135deg,#7c3aed,#ec4899);
    transition: 0.35s ease;
}

.magic-about-btn:hover{
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(124,58,237,0.3);
    color: #fff;
}


/* ========================= */
/* STATS */
/* ========================= */

.magic-about-stats{
    margin-top: 80px;
    position: relative;
    z-index: 2;
}

.magic-stat-card{
    background: #fff;
    border-radius: 24px;
    padding: 40px 30px;
    text-align: center;
    box-shadow: 0 15px 40px rgba(0,0,0,0.06);
    transition: 0.35s ease;
    height: 100%;
}

.magic-stat-card:hover{
    transform: translateY(-8px);
}

.magic-stat-number{
    font-size: 54px;
    font-weight: 800;
    background: linear-gradient(90deg,#7c3aed,#ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    line-height: 1;
}

.magic-stat-card p{
    margin-top: 15px;
    color: #6b7280;
    font-weight: 600;
    font-size: 16px;
}


/* ========================= */
/* RESPONSIVE */
/* ========================= */

@media(max-width:991px){

    .magic-about-heading h2{
        font-size: 38px;
    }

    .magic-about-content{
        padding: 35px;
    }

    .magic-about-image-box img{
        min-height: 450px;
    }

}

@media(max-width:768px){

    .magic-about-section{
        padding: 70px 0;
    }

    .magic-about-heading h2{
        font-size: 32px;
    }

    .magic-about-content{
        padding: 30px 25px;
    }

    .magic-about-content h3{
        font-size: 28px;
    }

    .magic-about-image-overlay{
        padding: 25px;
    }

    .magic-about-image-overlay h4{
        font-size: 22px;
    }

    .magic-stat-number{
        font-size: 42px;
    }

}

.image-wrapper img{
        aspect-ratio: 3 / 3;
}

img#lightboxImage {
    max-width: 261px;
    max-height: 666px !important;
     aspect-ratio: 2 / 2;
}
.modal-body.p-0.position-relative {
    display: flex;
    align-items: center;
    justify-content: center;
}
.play-overlay.position-absolute.top-50.start-50.translate-middle {
    display: flex;
    align-items: center;
    justify-content: center;
}

/*vidoe galallery css*/

/* VIDEO MODAL */

.custom-video-modal{
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;

    opacity: 0;
    visibility: hidden;

    transition: 0.35s ease;
}

.custom-video-modal.active{
    opacity: 1;
    visibility: visible;
}

.custom-video-modal-content{
    width: 90%;
    max-width: 900px;
    position: relative;

    transform: scale(0.8);
    transition: 0.35s ease;
}

.custom-video-modal.active .custom-video-modal-content{
    transform: scale(1);
}

.custom-video-modal iframe,
.custom-video-modal video{
    width: 100%;
    height: 500px;
    border-radius: 20px;
    background: #000;
}.video-thumb-image{
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.video-play-btn{
    display: flex !important; align-items: center !important; justify-content: center !important;
}
.custom-video-close{
    position: absolute;
    top: -50px;
    right: 0;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: #fff;
    border: none;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
}

@media(max-width:768px){

    .custom-video-modal iframe,
    .custom-video-modal video{
        height: 250px;
    }

}
.mySwiper{
    overflow: hidden;
    padding: 10px 0;
    margin:12px 0;
}

.mySwiper .swiper-wrapper{
    align-items: center;
}

.mySwiper .swiper-slide{
    height: auto;
    border-radius: 20px;
    overflow: hidden;
}

/* VIDEO BOX */

.video-slide{
    
    border-radius: 20px;
    overflow: hidden;
}
/*contact page css*/
/* ===== CONTACT SECTION ===== */

.magic-contact-section{
    background: #fff !important;
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.magic-contact-section::before{
    content: "";
    position: absolute;
    width: 500px;
    height: 500px;
    background: rgba(99,102,241,0.15);
    filter: blur(120px);
    top: -100px;
    left: -100px;
    border-radius: 50%;
}

.magic-contact-section::after{
    content: "";
    position: absolute;
    width: 400px;
    height: 400px;
    background: rgba(236,72,153,0.15);
    filter: blur(120px);
    bottom: -120px;
    right: -120px;
    border-radius: 50%;
}

.magic-contact-heading{
    text-align: center;
    margin-bottom: 70px;
    position: relative;
    z-index: 2;
}

.magic-contact-heading h2{
    font-size: 52px;
    font-weight: 800;
    color: #000;
    margin-bottom: 15px;
}

.magic-contact-heading span{
    background: linear-gradient(90deg,#8b5cf6,#ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.magic-contact-heading p{
    color: rgb(62 59 59 / 75%);
    font-size: 18px;
    max-width: 700px;
    margin: auto;
}

/* ===== CARDS ===== */

.magic-contact-card{
    background: #ededed4d;
    border: 1px solid rgba(255,255,255,0.08);
    backdrop-filter: blur(18px);
    border-radius: 30px;
    padding: 40px;
    height: 100%;
    position: relative;
    z-index: 2;
    transition: 0.4s;
}



/* ===== FORM ===== */

.magic-input-group{
    margin-bottom: 25px;
}

.magic-input-label{
    color: #4c4343;
    font-weight: 600;
    margin-bottom: 10px;
    display: block;
}

.magic-input,
.magic-select,
.magic-textarea{
    width: 100%;
    background: #0c0b0b12;
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 16px;
    padding: 16px 20px;
    color:#4a4545;
    font-size: 16px;
    transition: 0.3s;
}

.magic-input:focus,
.magic-select:focus,
.magic-textarea:focus{
    outline: none;
    border-color: #8b5cf6;
    box-shadow: 0 0 0 4px rgba(139,92,246,0.2);
}

.magic-select option{
    color: #000;
}

.magic-textarea{
    min-height: 160px;
    resize: none;
}

/* ===== BUTTON ===== */

.magic-submit-btn{
    width: 100%;
    border: none;
    padding: 16px;
    border-radius: 16px;
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    background: linear-gradient(135deg,#8b5cf6,#ec4899);
    transition: 0.3s;
}

.magic-submit-btn:hover{
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(236,72,153,0.35);
}

/* ===== CONTACT INFO ===== */

.magic-contact-title{
    font-size: 34px;
    font-weight: 800;
    color:#141313;
    margin-bottom: 35px;
}

.magic-contact-item{
    display: flex;
    align-items: flex-start;
    gap: 18px;
    margin-bottom: 30px;
}

.magic-contact-icon{
    width: 60px;
    height: 60px;
    border-radius: 18px;
    background: linear-gradient(135deg,#8b5cf6,#ec4899);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 22px;
    flex-shrink: 0;
}

.magic-contact-item h5{
    color: #746a6a;
    margin-bottom: 6px;
    font-weight: 700;
}

.magic-contact-item p,
.magic-contact-item a{
    color: rgb(76 70 70 / 75%);

    margin: 0;
    text-decoration: none;
    font-size: 17px;
}

.magic-contact-item a:hover{
    color: #fff;
}

/* ===== MAP ===== */

.magic-map-box{
    margin-top: 50px;
    border-radius: 30px;
    overflow: hidden;
    position: relative;
    z-index: 2;
    border: 1px solid rgba(255,255,255,0.1);
}

.magic-map-box iframe{
    width: 100%;
    height: 450px;
    border: 0;
}

/* ===== WHATSAPP BTN ===== */

.magic-whatsapp-btn{
    margin-top: 40px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 35px;
    border-radius: 60px;
    color: #fff;
    text-decoration: none;
    font-weight: 700;
    background: linear-gradient(135deg,#25D366,#128C7E);
    transition: 0.3s;
}

.magic-whatsapp-btn:hover{
    transform: translateY(-3px);
    color: #fff;
}

/* ===== RESPONSIVE ===== */

@media(max-width:991px){

    .magic-contact-heading h2{
        font-size: 38px;
    }

    .magic-contact-card{
        padding: 30px;
    }

    .magic-contact-title{
        margin-top: 30px;
    }
}




.swiper-wrapper{
    transition-timing-function: linear !important;
}


/*packegs*/
/* Different colors for each package */
.pricing-card a
{
    border:1px solid black !important;
}
.pricing-card  h5{
    color:black !important;
}
    .package-1{
        background: #fff0f594 !important;
    }

    .package-2{
        background: #e7e7e761 !important;
    }

    .package-3{
        background: #daffee5e !important;
    }

    .package-4{
        background:#ffffff5c !important;
    }

    .package-5{
        background:#fff0f5 !important;
    }
    /**/
    .package-1 .display-4 {
        color: #e70055 !important;
    }
    
    .package-2 .display-4 {
        color: #897c7c !important;
    }

    .package-3 .display-4 {
        color: #00934f !important;
    }

    .package-4 .display-4 {
        color:#262222d1 !important;
    }

    .package-5 .display-4 {
        color:#fff0f5 !important;
    }
    
.service-card h3 {font-size:22px !important; margin-top: 12px !important; }
/* MAIN BOX */
.call-us{
    background:#6f2c91;

    border-radius:20px;

    padding:35px 40px;

    display:flex;
    align-items:center;
    gap:25px;

    width:90%;

    overflow:hidden;
}

/* ICON */
.call-icon{
    flex-shrink:0;
}

.call-icon img{
    width:106px;
    height:auto;
    display:block;
}

/* CONTENT */
.call-content{
    color:#fff;
}

/* TITLE */
.call-content span{
    display:block;

    font-size:17px;
    font-weight:700;

    margin-bottom:10px;

    line-height:1.2;
}

/* PHONE */
.call-content a{
    display:block;

    color:#ffe600;

    font-size:19px;
    font-weight:800;

    text-decoration:none;

    margin-bottom:15px;

    transition:0.3s ease;
}

.call-content a:hover{
    color:#fff;
}

/* TEXT */
.call-content p{
    margin:0;

    font-size:15px;

    line-height:1.7;

    color:#fff;
}

/* LARGE LAPTOP */
@media(max-width:1400px){

    .call-content span{
        font-size:16px;
    }

    .call-content a{
        font-size:21px;
      margin-bottom: 0 !important;

    }

    .call-content p{
        font-size:14px;
    }

}

/* TABLET */
@media(max-width:992px){

    .call-us{
        padding:30px;
        gap:20px;
    }

    .call-icon img{
        width:90px;
    }

    .call-content span{
        font-size:24px;
    }

    .call-content a{
        font-size:30px;
    }

    .call-content p{
        font-size:18px;
    }

}

/* MOBILE */
@media(max-width:768px){

    .call-us{
        flex-direction:column;

        text-align:center;

        padding:25px 20px;
    }

    .call-icon img{
        width:80px;
    }

    .call-content span{
        font-size:22px;
    }

    .call-content a{
        font-size:23px;

        word-break:break-word;
    }

    .call-content p{
        font-size:15px;
        line-height:1.5;
    }

}

/* SMALL MOBILE */
@media(max-width:480px){

    .call-content span{
        font-size:20px;
    }

    .call-content a{
        font-size:22px;
    }

}
.contact-form-card form input,select{
    height:55px;
}
.contact-form-card h3{
    font-size:2.3rem;
}
h5.footer-title {
    color: white !important;
}
/* HIDE YOUTUBE CONTROLS */
.ytp-chrome-top,
.ytp-chrome-bottom,
.ytp-show-cards-title,
.ytp-watermark,
.ytp-gradient-top,
.ytp-gradient-bottom,
.ytp-large-play-button,
.player-fullscreen-controls{
    display:none !important;
}
/* crousel*/

section#contact {
    background: #f3f3f3 !important;
}
.secondimg {
    width: 452px !important;
}
.mt-custom {
  margin-top: 30px;
}
.b-shap {
     left: 3px; 
    position: absolute;
       width: 500px;
    height: 500px;
    border-radius: 50%;
    background-color: #eae9ea;
    top: 2%;
    z-index: -1;
}

    /*package css*/
/* CARD BASE */
.pricing-card {
  background: #ffffff;
  border-radius: 18px;
  border: 1px solid #eaeaea;
  padding: 30px;
  transition: all 0.35s ease;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
  position: relative;
}

/* HOVER EFFECT */
.pricing-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}

/* TITLE */
.pricing-card h5 {
  font-weight: 600;
  letter-spacing: 1px;
  color: #6b21a8;
}

/* PRICE */
.pricing-card .display-4 {
  font-size: 42px;
  color: #111;
  font-family: "Fredoka", sans-serif;
}
.row .col-lg-4:nth-child(1) .pricing-card {
    background: #d29eed29;
}

.row .col-lg-4:nth-child(1) h5 {
  color: #6b7280;
}

.row .col-lg-4:nth-child(1) .display-4 {
  color: #111827;
}

.row .col-lg-4:nth-child(1) ul li {
  color: #6b7280;
}

.row .col-lg-4:nth-child(1) .btn {
    border-color: #6b21a8;
    color: #0d4b76;
}
.row .col-lg-4:nth-child(1) .btn:hover{
    color:white;
}


.row .col-lg-4:nth-child(3) .pricing-card {
  background: #eff6ff;
}

.row .col-lg-4:nth-child(3) h5 {
  color: #374151;
}

.row .col-lg-4:nth-child(3) .display-4 {
  color: #1d4ed8;
}

.row .col-lg-4:nth-child(3) ul li {
  color: #374151;
}

.row .col-lg-4:nth-child(3) .btn {
  border-color: #1d4ed8;
  color: #1d4ed8;
}

.row .col-lg-4:nth-child(3) .btn:hover {
  background: #1d4ed8;
  color: #fff;
}
/* FEATURE LIST */
.pricing-card ul {
  flex-grow: 1; /* pushes button down */
  padding-left: 0;
}

.pricing-card ul li {
  font-size: 15px;
  color: #555;
  margin-bottom: 10px;
  transition: 0.2s;
      text-align: start;
}

.pricing-card ul li:hover {
  color: #000;
  transform: translateX(5px);
}

/* BUTTON */
.pricing-card .btn {
  margin-top: auto; /* 👈 THIS FIXES BUTTON ALIGNMENT */
  border-radius: 30px;
  padding: 10px;
  font-weight: 500;
  transition: 0.3s;
}

/* DEFAULT BUTTON */
.btn-outline-primary {
  border: 2px solid #6b21a8;
  color: #6b21a8;
}

.btn-outline-primary:hover {
  background: #6b21a8;
  color: #fff;
}

/*OPULAR CARD */


/* POPULAR BUTTON */
.pricing-card.popular .btn {
  background: #6b21a8;
  color: #fff;
  border: none;
}
/* BASE PRICE STYLE */
.pricing-card .display-4 {
  font-size: 44px;
  font-weight: 700;
  letter-spacing: -1px;
  margin-bottom: 10px;
}

/* DEFAULT PRICE */
.pricing-card .display-4 {
  color: #111827;
}

/* POPULAR PACKAGE PRICE */
.pricing-card.popular .display-4 {
  color: #6b21a8;
}

/* ADD SMALL CURRENCY STYLE */

/* OPTIONAL SUBTLE UNDERLINE EFFECT */
.pricing-card .display-4 {
    position: relative;
    display: inline-block;
    font-size: 35px !important;
}

.pricing-card .display-4::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -6px;
  width: 100%;
  height: 2px;
  background: #e9d5ff;
}

/* POPULAR UNDERLINE */
.pricing-card.popular .display-4::after {
  background: #6b21a8;
}
.pricing-card.popular .btn:hover {
  background: #4c1d95;
}
.pricing-card ul {
  min-height: 180px;
}

/* POPULAR BADGE */


/* EQUAL HEIGHT FIX */


.pricing-card {
    width: 100%;
    padding: 31px !important;
}
</style>
</head>

<body>
    <!-- 🔹 PAGE LOADER -->
  <div id="page-loader">
    <div class="loader-wrapper">
      <div class="magic-hat">🎩</div>
      <div class="loader-text">Preparing the Magic...</div>
      <div class="loader-bar"><div class="loader-fill"></div></div>
    </div>
  </div>

    <!-- TOP BAR -->
   {{-- <div class="py-2 bg-dark text-white small">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto d-flex align-items-center gap-3">
                    @php
                        $contact = \App\Models\ContactPage::first();
                    @endphp
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $contact->phone ?? '') }}"
                        class="text-white text-decoration-none">
                        <i class="fa fa-phone me-2"></i> {{ $contact->phone ?? '' }}
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp ?? '') }}" target="_blank"
                        class="text-white text-decoration-none">
                        <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp
                    </a>
                </div>
                <div class="col-auto">
                    <a href="{{ $contact->facebook ?? 'https://www.facebook.com/share/v/1BNv5xDvVX/?mibextid=wwXIfr' }}" class="text-white mx-3"><i
                            class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{ $contact->instagram ?? 'https://www.instagram.com/p/ClBVrggt-IG/?igsh=MXRmNmJyYWIzdXB5Mw==' }}" class="text-white mx-3"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="{{ $contact->youtube ?? 'https://youtu.be/6TMto0CnIDA?si=zneRsphmiuFc4ca3' }}" class="text-white mx-3"><i
                            class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>--}}
    <section class="top-brand-section">
    <div class="container text-center ">
      <h1 class="main-brand-title show_desktop">Magician Badshah Happy Event Planner</h1>
      <h1 class="main-brand-title show_mobile">Magician Badshah 
      <p class="main-brand-title">Happy Event Planner</p>
      </h1>
     <p class="main-brand-subtitle">✨ Special Theme  Party Organizer ✨</p> 
    </div>
  </section>
    <!-- NAVBAR -->
    {{--<nav class="navbar navbar-expand-lg sticky-top shadow-sm" id="mainNav">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/') }}">Magician Badshah</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-4">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Videos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('packages') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp ?? '') }}" target="_blank"
                    class="btn magic-btn ms-lg-4 d-none d-lg-block">
                    <i class="fa-brands fa-whatsapp"></i> Book Now
                </a>
            </div>
        </div>
    </nav>--}}
    <header class="main-header sticky-top">
  <div class="container">
   <nav class="navbar-wrapper d-flex align-items-center justify-content-between">

  <!-- LOGO -->


  <!-- DESKTOP MENU -->
  <ul class="desktop-nav list-unstyled mb-0 d-flex align-items-center gap-3">

    <li>
      <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
        Home
      </a>
    </li>

    <li>
      <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
        About
      </a>
    </li>

    <!-- SERVICES DROPDOWN -->
    <li class="dropdown">
      <a href="{{ route('services') }}" class="nav-link "">
        Services
      </a>

      <!--<ul class="dropdown-menu shadow-sm">-->
      <!--  <li>-->
      <!--    <a href="{{ route('services') }}" class="dropdown-item">-->
      <!--      <i class="bi bi-balloon-heart"></i> Birthday Parties-->
      <!--    </a>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <a href="{{ route('services') }}" class="dropdown-item">-->
      <!--      <i class="bi bi-stars"></i> Magic Shows-->
      <!--    </a>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <a href="{{ route('services') }}" class="dropdown-item">-->
      <!--      <i class="bi bi-stage"></i> Big Stage Shows-->
      <!--    </a>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <a href="{{ route('services') }}" class="dropdown-item">-->
      <!--      <i class="bi bi-people"></i> Group Events-->
      <!--    </a>-->
      <!--  </li>-->
      <!--</ul>-->
    </li>

    <!-- GALLERY DROPDOWN -->
    <li class="dropdown">
      <a href="{{ route('gallery') }}" class="nav-link ">
        Gallery
      </a>

    {{--  <ul class="dropdown-menu shadow-sm">
        <li>
          <a href="{{ route('gallery') }}" class="dropdown-item">
            <i class="bi bi-camera-video"></i> Video Gallery
          </a>
        </li>
        <li>
          <a href="{{ route('gallery') }}" class="dropdown-item">
            <i class="bi bi-image"></i> Photo Gallery
          </a>
        </li>
      </ul> --}}
    </li>

    <li>
      <a href="{{ route('packages') }}" class="nav-link {{ request()->routeIs('packages') ? 'active' : '' }}">
        Packages
      </a>
    </li>

    <li>
      <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
        Contact
      </a>
    </li>

  </ul>

  <!-- RIGHT SIDE -->
  <div class="d-flex gap-4 align-items-center justify-content-between">

    <!-- PHONE -->
    <div class="top_numbers d-flex gap-4 align-items-center">
      <a href="tel:+919305059906">
        <i class="fa-solid fa-phone"></i> +91 9305059906
      </a>
    </div>

    <!-- SOCIAL -->
    <div class="to_icons">
      <a href="https://wa.me/919305059906" target="_blank" class="social-icon">
    <i class="fa-brands fa-whatsapp text-white"></i>
</a>
      <a href="https://www.facebook.com/share/v/1BNv5xDvVX/?mibextid=wwXIfr" class="social-icon"><i class="fa-brands fa-facebook-f text-white"></i></a>
      <a href="https://www.instagram.com/p/ClBVrggt-IG/?igsh=MXRmNmJyYWIzdXB5Mw==" class="social-icon"><i class="fa-brands fa-instagram text-white"></i></a>
      <a href="https://youtu.be/6TMto0CnIDA?si=zneRsphmiuFc4ca3" class="social-icon"><i class="fa-brands fa-youtube text-white"></i></a>
    </div>



    <!-- CTA BUTTON (Optional) -->
    {{--
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->whatsapp ?? '') }}" 
       target="_blank"
       class="btn btn-primary-custom d-none d-lg-block">
      <i class="fa-brands fa-whatsapp"></i> Book Now
    </a>
    --}}

    <!-- MOBILE TOGGLE -->
    <button class="mobile-toggle d-lg-none" id="mobileToggle" aria-label="Open Menu">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>

  </div>

</nav>
  </div>
</header>
<aside class="mobile-sidebar" id="mobileSidebar">
    <div class="sidebar-header d-flex justify-content-between align-items-center mb-4">
      <span class="brand-logo">🎩 Abdul Baadshah</span>
      <button class="sidebar-close" id="sidebarClose" aria-label="Close Menu">✕</button>
    </div>
    <nav>
  <ul class="mobile-nav-list list-unstyled">

    <li>
      <a href="#" class="mobile-link"><i class="bi bi-house-heart"></i> Home</a>
    </li>

    <li>
      <a href="#about" class="mobile-link"><i class="bi bi-person-heart"></i> About Us</a>
    </li>

    <!-- SERVICES -->
    <li class="mobile-dropdown-item">
      <a href="#" class="mobile-link mobile-dropdown-toggle">
        <i class="bi bi-stars"></i> Services 
        <!--<i class="dropdown-arrow bi bi-chevron-down"></i>-->
      </a>
      <!--<ul class="mobile-dropdown">-->
      <!--  <li><a href="#services" class="dropdown-item">Birthday Parties</a></li>-->
      <!--  <li><a href="#services" class="dropdown-item">Magic Shows</a></li>-->
      <!--  <li><a href="#services" class="dropdown-item">Big Stage Shows</a></li>-->
      <!--</ul>-->
    </li>

    <!-- GALLERY -->
    <li class="mobile-dropdown-item">
      <a href="#" class="mobile-link ">
        <i class="bi bi-images"></i> Gallery 
        <!--<i class="dropdown-arrow bi bi-chevron-down"></i>-->
      </a>
      <!--<ul class="mobile-dropdown">-->
      <!--  <li><a href="#gallery" class="dropdown-item">Video Gallery</a></li>-->
      <!--  <li><a href="#gallery" class="dropdown-item">Photo Gallery</a></li>-->
      <!--</ul>-->
    </li>

    <li>
      <a href="#contact" class="mobile-link"><i class="bi bi-envelope-heart"></i> Contact</a>
    </li>

  </ul>
</nav>
    <div class="sidebar-cta mt-auto pt-4 border-top">
      <a href="#contact" class="btn btn-primary-custom w-100">Book Your Show</a>
      <p class="mt-2 mb-0 text-center text-secondary small">📞 +91 98765 43210</p>
    </div>
  </aside>
   <div class="sidebar-overlay" id="sidebarOverlay"></div>
    @yield('content')

    <!-- FOOTER -->
<footer class="main-footer bg-dark text-light pt-5 pb-3 position-relative overflow-hidden">

  <div class="container position-relative z-2">

    <!-- Decorative Background -->
    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25"
      style="background: radial-gradient(circle at 30% 70%, rgba(255,202,40,0.08), transparent 60%); pointer-events:none;">
    </div>

    <div class="row g-4 mb-4">

      <!-- BRAND -->
      <div class="col-lg-4 col-md-6">
        <h5 class="footer-title">🎩 Magician Abdul Baadshah</h5>

        <p class="text-secondary small">
          Creating magical moments for children with professional magic shows, birthday parties, and special events across India.
        </p>

        <div class="social-links d-flex gap-3 mt-3">
         <a href="{{ !empty($contact->whatsapp) ? 'https://wa.me/'.preg_replace('/[^0-9]/','',$contact->whatsapp) : '#' }}" class="social-icon">
            <i class="fa-brands fa-whatsapp text-white"></i>
          </a>
          <a href="{{ $contact->facebook ?? '#' }}" class="social-icon">
            <i class="fa-brands fa-facebook-f text-white"></i>
          </a>
          <a href="{{ $contact->instagram ?? '#' }}" class="social-icon">
            <i class="fa-brands fa-instagram text-white"></i>
          </a>
          <a href="{{ $contact->youtube ?? '#' }}" class="social-icon">
            <i class="fa-brands fa-youtube text-white"></i>
          </a>
        </div>
      </div>

      <!-- QUICK LINKS -->
      <div class="col-lg-2 col-md-6">
        <h5 class="footer-title">Quick Links</h5>
        <ul class="list-unstyled footer-links">
          <li><a href="{{ url('/') }}" class="text-secondary text-decoration-none">Home</a></li>
          <li><a href="{{ route('about') }}" class="text-secondary text-decoration-none">About Us</a></li>
          <li><a href="{{ route('services') }}" class="text-secondary text-decoration-none">Services</a></li>
          <li><a href="{{ route('gallery') }}" class="text-secondary text-decoration-none">Gallery</a></li>
          <li><a href="{{ route('contact') }}" class="text-secondary text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- SERVICES -->
      <div class="col-lg-3 col-md-6">
        <h5 class="footer-title">Services</h5>
        <ul class="list-unstyled footer-links">
          @php
            $services = \App\Models\Service::latest()->take(5)->get();
          @endphp

          @foreach($services as $service)
            <li>
              <a href="{{ route('services') }}" class="text-secondary text-decoration-none">
                {{ $service->title }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- CONTACT -->
      <div class="col-lg-3 col-md-6">
        <h5 class="footer-title">Contact Info</h5>

        <ul class="list-unstyled text-secondary small">
          <li class="mb-2">
            <i class="fa-solid fa-location-dot"></i>
            {{ $contact->address ?? 'Chowk, Lucknow Uttar Pradesh, India - 226003' }}
          </li>

          <li class="mb-2">
            <i class="fa-solid fa-phone"></i>
            <a href="tel:{{ $contact->phone ?? '' }}" class="text-light text-decoration-none">
              {{ $contact->phone ?? '+ 91 9838457702' }}
            </a>
          </li>

          <li class="mb-2">
            <i class="fa-brands fa-whatsapp"></i>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->whatsapp ?? '') }}"
               class="text-light text-decoration-none">
              {{ $contact->whatsapp ?? '+ 91 9305059906' }}
            </a>
          </li>

          <li class="mb-2">
            <i class="fa-regular fa-envelope"></i>
            <a href="mailto:{{ $contact->email ?? '' }}" class="text-light text-decoration-none">
              {{ $contact->email ?? 'magicianabdul55@gmail.com' }}
            </a>
          </li>

          <li>
            <i class="fa-regular fa-clock"></i> Mon-Sun: 10:30 AM - 9:00 PM
          </li>
        </ul>
      </div>

    </div>

    <!-- Divider -->
    <hr class="border-secondary">

    <!-- COPYRIGHT -->
    <div class="d-flex justify-content-between align-items-center text-secondary small mt-3 flex-wrap">

    <p class="mb-0">
        © {{ date('Y') }} Magician Abdul Baadshah. All Rights Reserved
    </p>

    <p class="mb-0">
        Design & Developed by 
        <a href="https://webmingo.com" target="_blank">
            Web Mingo IT Solutions Pvt. Ltd
        </a>
    </p>

</div>

  </div>
</footer>

    <!-- STICKY WHATSAPP -->
  {{--   <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->whatsapp ?? '') }}" target="_blank"
        class="sticky-whatsapp">
        <i class="fa-brands fa-whatsapp"></i>
    </a> --}}

    <!-- SCROLL TO TOP -->
   {{--<button onclick="window.scrollTo({top:0, behavior:'smooth'})" id="scrollTop" class="scroll-top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>--}}

    <!-- Bootstrap JS -->
  {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
<!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/lightgallery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0/plugins/video/lg-video.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2/plugins/zoom/lg-zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2/plugins/thumbnail/lg-thumbnail.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/justifiedGallery/dist/js/jquery.justifiedGallery.min.js"></script>

    <script>
    
    // video
    // LIGHTGALLERY

// OPEN MODAL

document.querySelectorAll('.openVideoModal').forEach(item => {

    item.addEventListener('click', function(){

        let type = this.getAttribute('data-type');
        let src = this.getAttribute('data-src');

        let modal = document.getElementById('videoModal');
        let body = document.getElementById('videoModalBody');

        // YOUTUBE

        if(type === 'youtube'){

            body.innerHTML = `
                <iframe 
                    src="${src}"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
                </iframe>
            `;

        }else{

            // MP4

            body.innerHTML = `
                <video controls autoplay>
                    <source src="${src}" type="video/mp4">
                </video>
            `;

        }

        modal.classList.add('active');

    });

});



// CLOSE MODAL

function closeVideoModal(){

    document.getElementById('videoModal').classList.remove('active');

    // STOP VIDEO

    document.getElementById('videoModalBody').innerHTML = '';

}


document.getElementById('closeVideoModal')
.addEventListener('click', closeVideoModal);



// CLOSE ON BACKDROP CLICK

document.getElementById('videoModal')
.addEventListener('click', function(e){

    if(e.target === this){
        closeVideoModal();
    }

});



// ESC KEY CLOSE

document.addEventListener('keydown', function(e){

    if(e.key === 'Escape'){
        closeVideoModal();
    }

});
    // Preloader
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 800);
        });

        // Sparkle Generator
        function createSparkles() {
            const container = document.getElementById('sparkles');
            for (let i = 0; i < 35; i++) {
                const sparkle = document.createElement('i');
                sparkle.className = 'sparkle fa-solid fa-star';
                sparkle.style.left = Math.random() * 100 + '%';
                sparkle.style.top = Math.random() * 80 + '%';
                sparkle.style.animationDelay = Math.random() * 4 + 's';
                sparkle.style.fontSize = (Math.random() * 18 + 12) + 'px';
                container.appendChild(sparkle);

                // Remove and recreate for endless effect
                setInterval(() => {
                    sparkle.style.opacity = '0';
                    setTimeout(() => {
                        sparkle.style.left = Math.random() * 100 + '%';
                        sparkle.style.top = Math.random() * 80 + '%';
                        sparkle.style.opacity = '1';
                    }, 3000);
                }, 6000);
            }
        }


        document.getElementById('contactForm').addEventListener('submit', function () {

            const name = document.getElementById('name').value.trim();
            const phone = document.getElementById('phone').value.trim();

            if (name === '' || phone === '') {
                alert("Please fill name and phone number ✨");
                event.preventDefault(); // stop only if invalid
                return;
            }

            const btn = this.querySelector('button');
            btn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Sending...`;
            btn.disabled = true;

        });

        // Scroll Top Button
        function handleScrollTop() {
            const btn = document.getElementById('scrollTop');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 600) {
                    btn.style.display = 'flex';
                } else {
                    btn.style.display = 'none';
                }
            });
        }

        // Smooth scrolling for nav links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Initialize everything
        window.onload = function () {
            createSparkles();
            handleScrollTop();

            // Navbar active link highlight on scroll (bonus)
            window.addEventListener('scroll', () => {
                const sections = document.querySelectorAll('section[id]');
                const navLinks = document.querySelectorAll('.nav-link');

                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (scrollY >= sectionTop - 300) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('text-primary');
                    if (link.getAttribute('href') === `#${current}`) {
                        link.classList.add('text-primary');
                    }
                });
            });

            // Auto carousel already handled by Bootstrap
            console.log('%c✨ Magician Badshah Homepage Loaded Successfully ✨', 'color:#e91e63; font-size:14px; font-weight:bold;');
        };
    </script>
    <script>
        function openGalleryModal(src) {
            document.getElementById('modalImage').src = src;
            new bootstrap.Modal(document.getElementById('galleryModal')).show();
        }
        
        
        // all js code

console.log("js is running...")
document.addEventListener('DOMContentLoaded', () => {
  // 🔹 Page Loader
  const loader = document.getElementById('page-loader');
  if (loader) {
  setTimeout(() => loader.classList.add('hidden'), 1200);
}

  // 🔹 AOS Init
  AOS.init({ duration: 800, easing: 'ease-in-out', once: true, offset: 80 });

  // 🔹 Hero Slider (Fade)
  const slides = document.querySelectorAll('.hero-slide');
  let currentSlide = 0;
  const nextSlide = () => {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('active');
  };
  setInterval(nextSlide, 5000);

  // 🔹 Mobile Sidebar (Custom Vanilla JS)
  const sidebar = document.getElementById('mobileSidebar');
  const toggle = document.getElementById('mobileToggle');
  const close = document.getElementById('sidebarClose');
  const overlay = document.getElementById('sidebarOverlay');

  const openSidebar = () => {
    sidebar.classList.add('active');
    overlay.classList.add('active');
    toggle.classList.add('active');
    document.body.style.overflow = 'hidden';
  };
  const closeSidebar = () => {
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
    toggle.classList.remove('active');
    document.body.style.overflow = '';
  };

  toggle.addEventListener('click', openSidebar);
  close.addEventListener('click', closeSidebar);
  overlay.addEventListener('click', closeSidebar);

  // Mobile Dropdowns
  document.querySelectorAll('.mobile-dropdown-toggle').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      btn.classList.toggle('active');
      const dropdown = btn.nextElementSibling;
      dropdown.classList.toggle('active');
    });
  });

  // Close sidebar on link click
  document.querySelectorAll('.mobile-link, .dropdown-item').forEach(link => {
    link.addEventListener('click', () => {
      if (!link.classList.contains('mobile-dropdown-toggle')) closeSidebar();
    });
  });

 
// 🔹 lightGallery Initialization
document.addEventListener('DOMContentLoaded', () => {
  const galleryElement = document.getElementById('lightgallery');
  
  if (galleryElement) {
    // Initialize lightGallery
    const lightGalleryInstance = lightGallery(galleryElement, {
      speed: 500,
      plugins: [lgZoom, lgThumbnail, lgFullscreen, lgPager],
      thumbnail: true,
      thumbWidth: 100,
      licenseKey: 'GPLv3',
      thumbHeight: 80,
      thumbMargin: 5,
      zoom: true,
      zoomFromOrigin: false,
      allowMediaOverlap: true,
      toggleThumb: true,
      actualSize: false,
      hideBarsDelay: 3000,
      counter: true,
      download: false,
      mobileSettings: {
        controls: true,
        showCloseIcon: true,
        download: false
      },
      strings: {
        closeGallery: 'Close Gallery',
        toggleThumbnails: 'Toggle Thumbnails',
        zoomIn: 'Zoom In',
        zoomOut: 'Zoom Out',
        viewFullscreen: 'View Fullscreen',
        exitFullscreen: 'Exit Fullscreen'
      }
    });
    
    // Gallery Filter Functionality
    // const filterBtns = document.querySelectorAll('.filter-btn');
    // const galleryItems = document.querySelectorAll('.gallery-item');
    
    // filterBtns.forEach(btn => {
    //   btn.addEventListener('click', () => {
    //     // Update active button
    //     filterBtns.forEach(b => b.classList.remove('active'));
    //     btn.classList.add('active');
        
    //     const filter = btn.dataset.filter;
        
    //     // Filter items with animation
    //     galleryItems.forEach((item, index) => {
    //       const category = item.dataset.category;
          
    //       if (filter === 'all' || category === filter) {
    //         item.classList.remove('hide');
    //         item.classList.add('show');
    //         // Staggered animation
    //         setTimeout(() => {
    //           item.style.opacity = '1';
    //           item.style.transform = 'scale(1)';
    //         }, index * 50);
    //       } else {
    //         item.classList.remove('show');
    //         item.classList.add('hide');
    //         item.style.opacity = '0';
    //         item.style.transform = 'scale(0.9)';
    //       }
    //     });
        
    //     // Refresh lightGallery after filtering
    //     setTimeout(() => {
    //       lightGalleryInstance.refresh();
    //     }, 400);
    //   });
    // });
    
    // Load More Functionality (Optional)
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    if (loadMoreBtn) {
      loadMoreBtn.addEventListener('click', () => {
        // Simulate loading more images
        loadMoreBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Loading...';
        
        setTimeout(() => {
          // Add more gallery items here (dynamically)
          // For demo, we'll just show an alert
          alert('In production, this would load more images from server!');
          loadMoreBtn.innerHTML = '<i class="bi bi-images me-2"></i>Load More Photos';
        }, 1000);
      });
    }
    
    // Add loaded class to images when they load
    document.querySelectorAll('.gallery-thumb img').forEach(img => {
      if (img.complete) {
        img.classList.add('loaded');
      } else {
        img.addEventListener('load', () => {
          img.classList.add('loaded');
        });
      }
    });
  }
});
  // 🔹 Testimonial Slider
  const testimonials = document.querySelectorAll('.testimonial-item');
  const dots = document.querySelectorAll('.dot');
  let currentTest = 0;

  const showTestimonial = (index) => {
    testimonials.forEach(t => t.classList.remove('active'));
    dots.forEach(d => d.classList.remove('active'));
    testimonials[index].classList.add('active');
    dots[index].classList.add('active');
  };

  dots.forEach((dot, i) => dot.addEventListener('click', () => showTestimonial(i)));
  setInterval(() => {
    currentTest = (currentTest + 1) % testimonials.length;
    showTestimonial(currentTest);
  }, 6000);

  // 🔹 Smooth Scroll for Anchor Links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const href = this.getAttribute('href');

    if (href === "#") return; // 🔥 FIX

    const target = document.querySelector(href);

    if (target) {
      e.preventDefault();

      const headerOffset = 80;
      const elementPosition = target.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

      window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
    }
  });
});

  // 🔹 Form Submission (Mock)
  const form = document.getElementById('bookingForm');
  if (form) {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const name = document.getElementById('name').value;
      alert(`✨ Thank you, ${name}! We'll call you shortly to book your magical event.`);
      form.reset();
    });
  }

  //Video Play Button
  document.getElementById('playBtn')?.addEventListener('click', () => {
    alert('🎬 Video would play here!\nIn production, this embeds a YouTube/Vimeo player or opens a lightbox.');
  });

  //  Year in Footer
  document.getElementById('year').textContent = new Date().getFullYear();
});



var swiper = new Swiper(".mySwiper", {

  loop: document.querySelectorAll(".swiper-slide").length > 5,

  speed: 7000,
 spaceBetween:10,
  freeMode: true,
  freeModeMomentum: false,

  allowTouchMove: true,

  autoplay: {
    delay: 0,
    disableOnInteraction: false,
    pauseOnMouseEnter: true, // IMPORTANT
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween:10,
    },

    480: {
      slidesPerView: 2,
      spaceBetween: 10,
    },

    768: {
      slidesPerView: 3,
      spaceBetween: 10,
    },

    1024: {
      slidesPerView: 4,
      spaceBetween: 15,
    },

    1280: {
      slidesPerView: 5,
      spaceBetween: 20,
    },
  },

});
const swiperContainer = document.querySelector('.mySwiper');

swiperContainer.addEventListener('mouseenter', () => {
    swiper.autoplay.stop();
});

swiperContainer.addEventListener('mouseleave', () => {
    swiper.autoplay.start();
});



lightGallery(document.getElementById('lightgallery'), {
    plugins: [lgZoom, lgThumbnail],
    speed: 500,

    zoom: true,
    actualSize: true,
    showZoomInOutIcons: true,

    thumbnail: true,
    animateThumb: true,

    download: false,

    // Navigation
    controls: true,

    // Responsive image handling
    selector: '.gallery-thumb',

    mobileSettings: {
      controls: true,
      showCloseIcon: true,
      download: false
    }
  });

// gallreyy js
// $(document).ready(function () {

//   function loadGallery(filter = "all") {

//     $("#animated-thumbnails-gallery").justifiedGallery('destroy');

//     let items = $("#animated-thumbnails-gallery a");

//     items.show();

//     if (filter !== "all") {
//       items.each(function () {
//         if ($(this).data("category") != filter) {
//           $(this).hide();
//         }
//       });
//     }

//     $("#animated-thumbnails-gallery").justifiedGallery({
//       captions: false,
//       lastRow: "hide",
//       rowHeight: 180,
//       margins: 5
//     }).on("jg.complete", function () {

//       lightGallery(document.getElementById("animated-thumbnails-gallery"), {
//         plugins: [lgZoom, lgThumbnail],
//         speed: 500
//       });

//     });

//   }

//   // FIRST LOAD
//   loadGallery();

//   // FILTER CLICK
//   $(".filter-btn").click(function () {

//     $(".filter-btn").removeClass("active");
//     $(this).addClass("active");

//     let filter = $(this).data("filter");

//     loadGallery(filter);

//   });

// });

const filterButtons = document.querySelectorAll(".filter-btn");
  const galleryItems = document.querySelectorAll(".gallery-item");

  filterButtons.forEach(button => {
    button.addEventListener("click", () => {
      
      // Remove active from all
      filterButtons.forEach(btn => btn.classList.remove("active"));
      button.classList.add("active");

      const filter = button.getAttribute("data-filter");

      galleryItems.forEach(item => {
        const category = item.getAttribute("data-category");

        if (filter === "all" || filter === category) {
          item.style.display = "block";
          setTimeout(() => {
            item.style.opacity = "1";
            item.style.transform = "scale(1)";
          }, 50);
        } else {
          item.style.opacity = "0";
          item.style.transform = "scale(0.8)";
          setTimeout(() => {
            item.style.display = "none";
          }, 300);
        }
      });

    });
  });



  // testimonials

var swiper = new Swiper(".testimonialSwiper", {
  loop: true,
  spaceBetween: 20,
  speed: 800,
   
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
     
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    576: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});



// faq

 const faqItems = document.querySelectorAll(".faq-item");

faqItems.forEach(item => {
  const question = item.querySelector(".faq-question");

  question.addEventListener("click", () => {

    // If already open → close it
    if (item.classList.contains("faq-open")) {
      item.classList.remove("faq-open");
      item.querySelector(".icon").textContent = "+";
      return;
    }

    // Otherwise → close all first
    faqItems.forEach(i => {
      i.classList.remove("faq-open");
      i.querySelector(".icon").textContent = "+";
    });

    // Then open clicked one
    item.classList.add("faq-open");
    item.querySelector(".icon").textContent = "−";

  });
});



 const dropdownItems = document.querySelectorAll(".mobile-dropdown-item");

dropdownItems.forEach(item => {
  const toggle = item.querySelector(".mobile-dropdown-toggle");

  if (!toggle) return; // safety

  toggle.addEventListener("click", function (e) {
    e.preventDefault();

    const isOpen = item.classList.contains("dropdown-open");

    // 🔥 Close ALL dropdowns
    dropdownItems.forEach(i => {
      i.classList.remove("dropdown-open");
    });

    // 🔥 Open ONLY if it was closed
    if (!isOpen) {
      item.classList.add("dropdown-open");
    }
  });
});


// gallrey js



</script>

<script>

/* ========================= */
/* COUNTER ANIMATION */
/* ========================= */

const counters = document.querySelectorAll('.counter');

const speed = 200;

const startCounter = () => {

    counters.forEach(counter => {

        const updateCount = () => {

            const target = +counter.getAttribute('data-target');

            const count = +counter.innerText;

            const increment = target / speed;

            if(count < target){

                counter.innerText = Math.ceil(count + increment);

                setTimeout(updateCount, 10);

            }else{

                counter.innerText = target + '+';

            }

        };

        updateCount();

    });

};



/* INTERSECTION OBSERVER */

const aboutSection = document.querySelector('.magic-about-stats');

const observer = new IntersectionObserver(entries => {

    entries.forEach(entry => {

        if(entry.isIntersecting){

            startCounter();

            observer.disconnect();

        }

    });

}, {

    threshold: 0.3

});

observer.observe(aboutSection);

</script>
</body>

</html>