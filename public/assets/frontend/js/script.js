// popup

function toggle() {
    var blur = document.getElementById("blur");
    blur.classList.toggle("active");
    var popup = document.getElementById("popup");
    popup.classList.toggle("active");
}

function googleTranslateElementInit() {
    new google.translate.TranslateElement(
        { pageLanguage: "en" },
        "google_translate_element"
    );

    var $googleDiv = $("#google_translate_element .skiptranslate");
    var $googleDivChild = $("#google_translate_element .skiptranslate div");
    $googleDivChild.next().remove();

    $googleDiv
        .contents()
        .filter(function () {
            return this.nodeType === 3 && $.trim(this.nodeValue) !== "";
        })
        .remove();
}
