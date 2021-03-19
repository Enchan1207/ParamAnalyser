//
// details展開時にログファイルを自動で読み込む
//

document.addEventListener('DOMContentLoaded', (event)=>{
    // 各detailsについて
    document.querySelectorAll('.cell').forEach(element => {
        const detailsElem = element.querySelector("details");
        detailsElem.addEventListener('click', ()=>{
            // 開いていなければ
            const isOpened = detailsElem.hasAttribute('open');
            if(!isOpened){
                // XHRでログを読み込んで表示
                const xhr = new XMLHttpRequest();
                xhr.open("GET", detailsElem.getAttribute('data-path'));
                xhr.addEventListener('load', (event)=>{
                    const response = event.target.responseText;
                    detailsElem.querySelector("code").innerHTML = response;
                });
                xhr.send();
            }
        })
    });

});
