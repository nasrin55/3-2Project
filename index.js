var icon = document.getElementById("icon");

        if(localStorage.getItem("theme") == null){
            localStorage.setItem("theme", "light");
        }

        let localData = localStorage.getItem("theme");

        if(localData == "light"){
            icon.src="moon.png";
            document.body.classList.remove("dark-theme");
        }
        else if(localData=="dark"){
            icon.src="sun.png";
            document.body.classList.add("dark-theme");
        }

        icon.onclick = function(){
            document.body.classList.toggle("dark-theme");
            if(document.body.classList.contains("dark-theme")){
                icon.src = "sun.png";
                localStorage.setItem("theme", "dark");
            }
            else{
                icon.src = "moon.png";
                localStorage.setItem("theme", "light");
            }
        }