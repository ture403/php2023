// 운영체제 정보 알아내기
let os = navigator.userAgent.toLowerCase();
// Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36

if(os.indexOf("windows") > -1){
    document.querySelector("body").classList.add("windows");
} else if(os.indexOf("macintosh") > -1) {
    document.querySelector("body").classList.add("macintosh");
} else if(os.indexOf("iphone") > -1) {
    document.querySelector("body").classList.add("iphone");
} else if(os.indexOf("android") > -1) {
    document.querySelector("body").classList.add("android");
}

