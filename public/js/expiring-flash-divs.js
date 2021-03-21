setTimeout(
    function()
    {
        Array.from(
            document.getElementsByClassName('flash-note')
        ).map(
            elem => elem.parentNode.removeChild(elem)
        );
    },
    2000
);
