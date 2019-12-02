console.log('the search script is here');

class Search {
    //setup Object
    constructor(){
        this.openButton = $('#searchTrigger');
        this.closeButton =$('#closeTrigger');
        this.searchBox = $('#searchBox');
        this.searchInput = $('#search');
        this.events();
        this.inputTimer;
        this.searchResult = $('#searchResults');
        this.previousValue;
        this.loader = `<div id="loadingIcon" class="preloader-wrapper active big">
                            <div class="spinner-layer spinner-red-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                            <div class="circle-clipper right">
                            <div class="circle">
                            </div>
                            </div>
                            </div>
                        </div>`;
        this.isLoading = false;
    }
    //events
    events(){
        this.openButton.on('click',this.openSearchBox.bind(this));
        this.closeButton.on('click',this.closeSearchBox.bind(this));
        this.searchInput.on('keyup',this.startSearch.bind(this));
    }
    //functions
    startSearch(){
        if(this.searchInput.val() != this.previousValue ){
            clearTimeout(this.inputTimer);
            if(this.searchInput.val()){
                if(!this.isLoading) {
                    this.searchResult.html(this.loader);
                    this.isLoading = true;
                }
                this.inputTimer = setTimeout(this.getResults.bind(this), 2000);
                this.previousValue = this.searchInput.val();
            }else{
                this.searchResult.html('');
                this.isLoading = false;
            }
        }
    }
    getResults(){
        $.getJSON('http://localhost/lepetitfromage/app/wp-json/wp/v2/posts?search='+ this.searchInput.val(), function(data){
         alert(data[0]['title']['rendered']);
        })
    }
    openSearchBox() {
        this.searchBox.css('display','block');
        $('body').css('overflow','hidden');
    }
    closeSearchBox() {
        this.searchBox.css('display','none');
        $('body').css('overflow','scroll');
    }
    
    }

let searchAll = new Search();
