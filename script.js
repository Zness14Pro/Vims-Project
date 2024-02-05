const ratio = .1
const options = {
    root: null, //racine, elle sert de zone d'affichage, detecte si l'element est visible ou pas  
    rootMargin: "0px", 
    threshold: .1, // poursentage de visibilite de l'element 10%
  };
  
const handleIntersect = function(entries, observer){
    entries.forEach(function  (entry){ 
        if(entry.intersectionRatio > ratio){
            entry.target.classList.add('reveal-visible')
            observer.unobserve(entry.target)

        }
    })
   
}

const observer = new IntersectionObserver(handleIntersect, options);

document.querySelectorAll('.reveal').forEach(function (r){
    observer.observe(r)
}
)