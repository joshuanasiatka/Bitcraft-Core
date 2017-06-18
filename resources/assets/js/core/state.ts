import jquery from 'jquery';

export default class State {

    private V : object;
    /**
     * Constructs server object for other modules
     * @param  {Object} V [Server object full of application data. Defaults to empty object]
     * @constructor
     */
    constructor (V : {}) {
        this.V = V;
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
