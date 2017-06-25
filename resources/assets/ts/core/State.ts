import jquery from 'jquery';
import axios from 'axios';

export default class State {

    private V : object;
    private app : HTMLElement;
    private axios;

    /**
     * Constructs server object for other modules
     * @param  {Object} V [Server object full of application data. Defaults to empty object]
     * @constructor
     */
    constructor (V ?: object) {
        this.V = V || {};
        this.app = document.getElementById('app');
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

}
