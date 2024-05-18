<h1 id="titleTeams">Teams</h1>

<div style="margin-top: 20px; margin-bottom: 20px">
    <button type="button" class="collapsible row align-items-center justify-content-between" style="margin-left: 0px">
        <div class="col-3 col-md-2 col-xl-1">
            <img src="/images/Designer.png" alt="PYF_Logo" width="100px" height="100px" style="border-radius: 50%">
        </div>
        <p class="teamName col-7 col-md-9 col-xl-10">ValoRats</p>
    </button>
    <div class="content">
        <p style="margin-top: 15px; margin-bottom: 15px">Main roster :</p>
        <div class="row justify-content-around align-items-center">
            <p class="col-12 col-md-2 roster">TWYL (C)</p>
            <p class="col-12 col-md-2 roster">Rapid</p>
            <p class="col-12 col-md-2 roster">ouro</p>
            <p class="col-12 col-md-2 roster">Alexx</p>
            <p class="col-12 col-md-2 roster">Jacob</p>
        </div>
    </div>
</div>

<div style="margin-top: 20px; margin-bottom: 20px">
    <button type="button" class="collapsible row align-items-center justify-content-between" style="margin-left: 0px">
        <div class="col-3 col-md-2 col-xl-1">
            <img src="/images/LogoTemplate.png" alt="PYF_Logo" width="100px" height="100px">
        </div>
        <p class="teamName col-7 col-md-9 col-xl-10">Tristan's Lil Kittens</p>
    </button>
    <div class="content">
        <p style="margin-top: 15px; margin-bottom: 15px">Main roster :</p>
        <div class="row justify-content-around align-items-center">
            <p class="col-12 col-md-2 roster">Tristan (C)</p>
            <p class="col-12 col-md-2 roster">koffee</p>
            <p class="col-12 col-md-2 roster">MrCleverClean</p>
            <p class="col-12 col-md-2 roster">dong</p>
            <p class="col-12 col-md-2 roster">Mr Peak</p>
        </div>
        <p style="margin-top: 20px">Substitutes : </p>
        <div class="row justify-content-around align-items-center" style="margin-bottom: 10px">
            <p class="col-2 roster">curry</p>
            <p class="col-2 roster">shroud</p>
            <p class="col-2 roster"></p>
            <p class="col-2 roster"></p>
            <p class="col-2 roster"></p>
        </div>
    </div>
</div>

<div style="margin-top: 20px; margin-bottom: 20px">
    <button type="button" class="collapsible row align-items-center justify-content-between" style="margin-left: 0px">
        <div class="col-3 col-md-2 col-xl-1">
            <img src="/images/cornboyz.jpg" alt="PYF_Logo" width="100px" height="100px" style="border-radius: 50%">
        </div>
        <p class="teamName col-7 col-md-9 col-xl-10">CornBoyz</p>
    </button>
    <div class="content">
        <p style="margin-top: 15px; margin-bottom: 15px">Main roster :</p>
        <div class="row justify-content-around align-items-center">
            <p class="col-12 col-md-2 roster">unosam (C)</p>
            <p class="col-12 col-md-2 roster">AwkBellz</p>
            <p class="col-12 col-md-2 roster">inonsang</p>
            <p class="col-12 col-md-2 roster">bonaventure</p>
            <p class="col-12 col-md-2 roster">Mid Player</p>
        </div>
        <p style="margin-top: 20px">Coach : </p>
        <div class="row justify-content-around align-items-center" style="margin-bottom: 10px">
            <p class="col-2 roster">Dr. Earl MD</p>
        </div>
    </div>
</div>

<div style="margin-top: 20px; margin-bottom: 20px">
    <button type="button" class="collapsible row align-items-center justify-content-between" style="margin-left: 0px">
        <div class="col-3 col-md-2 col-xl-1">
            <img src="/images/brimmy.jpg" alt="PYF_Logo" width="100px" height="100px" style="border-radius: 50%">
        </div>
        <p class="teamName col-7 col-md-9 col-xl-10">Brimmy Babies</p>
    </button>
    <div class="content">
        <p style="margin-top: 15px; margin-bottom: 15px">Main roster :</p>
        <div class="row justify-content-around align-items-center">
            <p class="col-12 col-md-2 roster">zekken</p>
            <p class="col-12 col-md-2 roster">Sacy</p>
            <p class="col-12 col-md-2 roster">TenZ</p>
            <p class="col-12 col-md-2 roster">johnqt</p>
            <p class="col-12 col-md-2 roster">Zellsis</p>
        </div>
        <p style="margin-top: 20px">Substitutes : </p>
        <div class="row justify-content-around align-items-center" style="margin-bottom: 10px">
            <p class="col-2 roster">curry</p>
            <p class="col-2 roster">shroud</p>
            <p class="col-2 roster"></p>
            <p class="col-2 roster"></p>
            <p class="col-2 roster"></p>
        </div>
    </div>
</div>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>


<!-- <div class="team row align-items-center justify-content-between">
    <div class="col-3 col-md-2 col-xl-1">
        <img src="/images/LogoTemplate.png" alt="PYF_Logo" width="100px" height="100px">
    </div>
    <p class="teamName col-7 col-md-8 col-xl-10">ROGUE</p>
    <i class="fa-solid fa-chevron-down fa-2xl col-2 col-xl-1 drop"></i>
</div> -->
