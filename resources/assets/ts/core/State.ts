import { init } from './Action';
import Constants from './Constants';

export default class State {

    private V        : object;
    private app      : HTMLElement;
    private elements : object;

    /**
     * Constructs server object for other modules
     * @param  {Object} V [Server object full of application data. Defaults to empty object]
     * @constructor
     */
    constructor (V ?: object) {
        this.V       = V || {};
        this.app     = document.getElementById('app');
        this.V.store = localStorage;
    }

    public getServerContext () : object {
        return this.V;
    }

    public setServerContext (V : object) : void {
        this.V = V;
    }

    public setServerContextValue (key : string, value : string) : void {
        this.V[key] = value;
    }

    public addElements (elements : object) : void {
        this.elements = elements;
        this.elements['app'] = this.app;
        // Add data binding here for elements
        this.bindElements();
        // Pass state to actions
        init(this.elements);
    }

    private bindElements () : void {
        for (let element in this.elements) {
            // this.elements[element].ref.element.addEventListener('change', this, false);
        }
    }

    /**
     * Sets up initial states for components
     */
    public init () : void {
        if (this.getServerContext().store) {
            let store     = this.getServerContext().store;
            let constants = Constants();
            if (store.sidebar_size === constants.sidebar_size) this.elements.navbar.ref.navbarResize(true);
        }
    }

}
