import React from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import Toastify from "../../dist/assets/vendors/toastify/toastify";

export default class WelcomeComponent extends React.Component {
    // Constructor
    constructor(props) {
        /* This is the constructor function for the class. */
        super(props);

        /* This is the state of the component. */
        this.state = {
            items: [],
            DataisLoaded: false,
        };
    }

    // ComponentDidMount is used to
    // execute the code
    componentDidMount() {
        fetch("api/application/posts")
            .then((res) => res.json())
            .then((json) => {
                this.setState({
                    items: json,
                    DataisLoaded: true,
                });
            });
    }

    render() {
        /* This is a JavaScript file that is being imported into the index.js file. */
        const { DataisLoaded, items } = this.state;

        /* The code above is a JavaScript function that returns a React component. 
        
        The function is called when the page loads. 
        
        The function returns a React component that contains a div element. 
        
        The div element contains a h1 element. 
        
        The h1 element contains the text "Loading...." */
        if (!DataisLoaded) {
            return (
                <div>
                    <h1> Loading.... </h1>
                </div>
            );
        }

        /* The map() method is used to loop over the array and return the array items.
        
        The return() method is used to return the array items.
        
        The className="hero" is used to add the className to the section element.
        
        The h3 element is used to add the h3 element to the section element.
        
        The hr element is used to add the hr element to the section element.
        
        The div className="row" is used to add the className to the div element.
        
        The div className="col-xl- */
        return (
            <section className="hero">
                <h3> Blog Posts Listings </h3> <hr />
                <div className="row">
                    {items.data.map((item) => (
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <img
                                        src="https://via.placeholder.com/150"
                                        class="card-img-top img-fluid"
                                        alt="singleminded"
                                    />
                                    <div class="card-body">
                                        <h5 class="card-title">{item.title}</h5>
                                        <p class="card-text">
                                            {item.description}
                                        </p>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        {item.published}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    ))}
                </div>
            </section>
        );
    }
}

if (document.getElementById("welcome-component")) {
    // find element by id
    const element = document.getElementById("welcome-component");

    // create new props object with element's data-attributes
    const props = Object.assign({}, element.dataset);

    // render element with props (using spread)
    ReactDOM.render(<WelcomeComponent {...props} />, element);
}
