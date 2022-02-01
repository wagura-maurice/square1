import React from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import Toastify from "../../dist/assets/vendors/toastify/toastify";

export default class HomeComponent extends React.Component {
    // Constructor
    constructor(props) {
        /* This is the constructor function for the class. */
        super(props);

        /* The state object is a JavaScript object that contains the data that the component needs to
        render. The state object is the only source of truth for the component. The state object is
        the only place where you should be manipulating the data that the component needs to render.
        
        The state object is a JavaScript object that contains the data that the component needs to
        render. The state object is the only source of truth for the component. The state object is
        the only place where you should be manipulating the data that the component needs to render.
        
        The state object is a JavaScript object that contains the data that */
        this.state = {
            items: [],
            DataisLoaded: false,
            title: "",
            description: "",
        };
    }

    // ComponentDidMount is used to
    // execute the code
    componentDidMount() {
        fetch("api/application/posts?user_id=" + this.props.user_id)
            .then((res) => res.json())
            .then((json) => {
                this.setState({
                    items: json,
                    DataisLoaded: true,
                });
            });
    }

    onChange = (e) => {
        /*
          Because we named the inputs to match their
          corresponding values in state, it's
          super easy to update the state
        */
        this.setState({ [e.target.name]: e.target.value });
    };

    handleSubmit = (e) => {
        e.preventDefault();

        // get our form data out of state
        const { title, description } = this.state;

        /* The axios.post() method is used to send a POST request to the specified URL. The first
        argument is the URL to send the request to. The second argument is the data to send. The
        third argument is an object containing the headers to send along with the request.
        
        The .then() method is used to handle the response from the server. The .catch() method is
        used to handle any errors that may occur.
        
        The .then() method is used to handle the response from the server. The .catch() method is
        used to handle any errors that may occur. */
        axios
            .post(
                this.props.action_url,
                {
                    title,
                    description,
                },
                {
                    headers: {
                        Accept: "application/json",
                        "Content-Type": "application/json",
                    },
                }
            )
            .then(function (response) {
                Toastify({
                    text:
                        response.data.data.title.toUpperCase() +
                        ", SUCCESSFULLY POSTED.",
                    duration: 12000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    backgroundColor:
                        "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
            })
            .catch(function (error) {
                Toastify({
                    text: error,
                    duration: 12000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    backgroundColor:
                        "linear-gradient(to right, #00b09b, #dc3545)",
                }).showToast();
            });

        setTimeout(() => {
            // Resetting Controlled States to Initial State
            this.setState({
                title: "",
                description: "",
            });

            // Resetting Un-Controlled States to Initial State
            e.target.reset();

            /* It reloads the page without sending the browser any additional information. */
            window.location.reload(false);
        }, 840);
    };

    render() {
        /* This is a JavaScript file that is being imported into the HTML file. */
        const { DataisLoaded, items, title, description } = this.state;

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

        /* The BlogPostList component
        is a stateful component that renders a list of blog posts. It uses the
        BlogPostListItem component to render each blog post.
        
        The BlogPostList component uses the BlogPostListItem component to render each
        blog post. The BlogPostListItem component is a stateless component that
        renders a single blog post.
        
        The BlogPostList component uses the BlogPostListItem component to render each
        blog post. The BlogPostListItem component is a stateless component that
        renders a single blog post.
        
        The Blog */
        return (
            <section className="hero">
                <div className="row">
                    <div class="col-6">
                        <h3> Blog Posts Listings </h3>{" "}
                    </div>
                    <div class="col-6">
                        <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#inlineForm"
                            class="btn btn-primary float-end"
                        >
                            New Blog Post
                        </button>
                        <div
                            className="modal fade text-left modal-borderless"
                            id="inlineForm"
                            tabIndex={-1}
                            role="dialog"
                            aria-labelledby="myModalLabel33"
                            aria-hidden="true"
                        >
                            <div
                                className="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                role="document"
                            >
                                <div className="modal-content">
                                    <div className="modal-header bg-success">
                                        <h4
                                            className="modal-title"
                                            id="myModalLabel33"
                                        >
                                            Blog Post Form{" "}
                                        </h4>
                                        <button
                                            type="button"
                                            className="close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            <i data-feather="x" />
                                        </button>
                                    </div>
                                    <form
                                        className="form"
                                        method="POST"
                                        action={this.props.action_url}
                                        id="new-blog-post-form"
                                        onSubmit={this.handleSubmit.bind(this)}
                                    >
                                        <div className="modal-body">
                                            <div className="form-group position-relative has-icon-right">
                                                <input
                                                    type="text"
                                                    className="form-control"
                                                    name="title"
                                                    value={title}
                                                    onChange={this.onChange}
                                                    placeholder="enter blog post headline title."
                                                    required
                                                />
                                                <div className="form-control-icon">
                                                    <i className="bi bi-bookmarks" />
                                                </div>
                                            </div>
                                            <div className="form-group with-title mb-3">
                                                <textarea
                                                    className="form-control"
                                                    id="exampleFormControlTextarea1"
                                                    name="description"
                                                    defaultValue={description}
                                                    onChange={this.onChange}
                                                    rows={3}
                                                    required
                                                />
                                                <label>
                                                    enter blog post description
                                                </label>
                                            </div>
                                        </div>
                                        <div className="modal-footer">
                                            <button
                                                type="button"
                                                className="btn btn-light-secondary"
                                                data-bs-dismiss="modal"
                                            >
                                                <i className="bx bx-x d-block d-sm-none" />
                                                <span className="d-none d-sm-block">
                                                    Close
                                                </span>
                                            </button>
                                            <button
                                                type="submit"
                                                className="btn btn-primary ml-1"
                                                // data-bs-dismiss="modal"
                                            >
                                                <i className="bx bx-check d-block d-sm-none" />
                                                <span className="d-none d-sm-block">
                                                    Submit
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
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

if (document.getElementById("home-component")) {
    // find element by id
    const element = document.getElementById("home-component");

    // create new props object with element's data-attributes
    const props = Object.assign({}, element.dataset);

    // render element with props (using spread)
    ReactDOM.render(<HomeComponent {...props} />, element);
}
