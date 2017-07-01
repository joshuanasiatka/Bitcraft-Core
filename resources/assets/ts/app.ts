import Navbar   from './core/components/Navbar';
import Search   from './core/components/Search';
import Sidebar  from './core/components/Sidebar';
import State    from './core/State';

// V is the global server object that is defined in a template from our backend.
let V = V || {};

// Bind our server object with our app state
let state = new State(V);

// Bind elements to our application state
state.addElements({
    navbar : {
        name : 'navbar',
        ref : new Navbar({ size : state.getServerContext().store.sidebar_size })
    },
    sidebar : {
        name : 'sidebar',
        ref : new Sidebar(state.getServerContext().sidebar)
    }
});

// Set global stored 
state.init();
