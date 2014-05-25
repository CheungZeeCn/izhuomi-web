// Minified using Javascript Aggregator - see /sites/default/files/js/js_54e47be9161a45893241d3c49b63afc0.js for original source including licensing information.
(function() {
    var l = this,
    g, y = l.jQuery,
    p = l.$,
    o = l.jQuery = l.$ = function(E, F) {
        return new o.fn.init(E, F)
    },
    D = /^[^<]*(<(.|\s)+>)[^>]*$|^#([\w-]+)$/,
    f = /^.[^:#\[\.,]*$/;
    o.fn = o.prototype = {
        init: function(E, H) {
            E = E || document;
            if (E.nodeType) {
                this[0] = E;
                this.length = 1;
                this.context = E;
                return this
            }
            if (typeof E === "string") {
                var G = D.exec(E);
                if (G && (G[1] || !H)) {
                    if (G[1]) {
                        E = o.clean([G[1]], H)
                    } else {
                        var I = document.getElementById(G[3]);
                        if (I && I.id != G[3]) {
                            return o().find(E)
                        }
                        var F = o(I || []);
                        F.context = document;
                        F.selector = E;
                        return F
                    }
                } else {
                    return o(H).find(E)
                }
            } else {
                if (o.isFunction(E)) {
                    return o(document).ready(E)
                }
            }
            if (E.selector && E.context) {
                this.selector = E.selector;
                this.context = E.context
            }
            return this.setArray(o.isArray(E) ? E: o.makeArray(E))
        },
        selector: "",
        jquery: "1.3.2",
        size: function() {
            return this.length
        },
        get: function(E) {
            return E === g ? Array.prototype.slice.call(this) : this[E]
        },
        pushStack: function(F, H, E) {
            var G = o(F);
            G.prevObject = this;
            G.context = this.context;
            if (H === "find") {
                G.selector = this.selector + (this.selector ? " ": "") + E
            } else {
                if (H) {
                    G.selector = this.selector + "." + H + "(" + E + ")"
                }
            }
            return G
        },
        setArray: function(E) {
            this.length = 0;
            Array.prototype.push.apply(this, E);
            return this
        },
        each: function(F, E) {
            return o.each(this, F, E)
        },
        index: function(E) {
            return o.inArray(E && E.jquery ? E[0] : E, this)
        },
        attr: function(F, H, G) {
            var E = F;
            if (typeof F === "string") {
                if (H === g) {
                    return this[0] && o[G || "attr"](this[0], F)
                } else {
                    E = {};
                    E[F] = H
                }
            }
            return this.each(function(I) {
                for (F in E) {
                    o.attr(G ? this.style: this, F, o.prop(this, E[F], G, I, F))
                }
            })
        },
        css: function(E, F) {
            if ((E == "width" || E == "height") && parseFloat(F) < 0) {
                F = g
            }
            return this.attr(E, F, "curCSS")
        },
        text: function(F) {
            if (typeof F !== "object" && F != null) {
                return this.empty().append((this[0] && this[0].ownerDocument || document).createTextNode(F))
            }
            var E = "";
            o.each(F || this,
            function() {
                o.each(this.childNodes,
                function() {
                    if (this.nodeType != 8) {
                        E += this.nodeType != 1 ? this.nodeValue: o.fn.text([this])
                    }
                })
            });
            return E
        },
        wrapAll: function(E) {
            if (this[0]) {
                var F = o(E, this[0].ownerDocument).clone();
                if (this[0].parentNode) {
                    F.insertBefore(this[0])
                }
                F.map(function() {
                    var G = this;
                    while (G.firstChild) {
                        G = G.firstChild
                    }
                    return G
                }).append(this)
            }
            return this
        },
        wrapInner: function(E) {
            return this.each(function() {
                o(this).contents().wrapAll(E)
            })
        },
        wrap: function(E) {
            return this.each(function() {
                o(this).wrapAll(E)
            })
        },
        append: function() {
            return this.domManip(arguments, true,
            function(E) {
                if (this.nodeType == 1) {
                    this.appendChild(E)
                }
            })
        },
        prepend: function() {
            return this.domManip(arguments, true,
            function(E) {
                if (this.nodeType == 1) {
                    this.insertBefore(E, this.firstChild)
                }
            })
        },
        before: function() {
            return this.domManip(arguments, false,
            function(E) {
                this.parentNode.insertBefore(E, this)
            })
        },
        after: function() {
            return this.domManip(arguments, false,
            function(E) {
                this.parentNode.insertBefore(E, this.nextSibling)
            })
        },
        end: function() {
            return this.prevObject || o([])
        },
        push: [].push,
        sort: [].sort,
        splice: [].splice,
        find: function(E) {
            if (this.length === 1) {
                var F = this.pushStack([], "find", E);
                F.length = 0;
                o.find(E, this[0], F);
                return F
            } else {
                return this.pushStack(o.unique(o.map(this,
                function(G) {
                    return o.find(E, G)
                })), "find", E)
            }
        },
        clone: function(G) {
            var E = this.map(function() {
                if (!o.support.noCloneEvent && !o.isXMLDoc(this)) {
                    var I = this.outerHTML;
                    if (!I) {
                        var J = this.ownerDocument.createElement("div");
                        J.appendChild(this.cloneNode(true));
                        I = J.innerHTML
                    }
                    return o.clean([I.replace(/ jQuery\d+="(?:\d+|null)"/g, "").replace(/^\s*/, "")])[0]
                } else {
                    return this.cloneNode(true)
                }
            });
            if (G === true) {
                var H = this.find("*").andSelf(),
                F = 0;
                E.find("*").andSelf().each(function() {
                    if (this.nodeName !== H[F].nodeName) {
                        return
                    }
                    var I = o.data(H[F], "events");
                    for (var K in I) {
                        for (var J in I[K]) {
                            o.event.add(this, K, I[K][J], I[K][J].data)
                        }
                    }
                    F++
                })
            }
            return E
        },
        filter: function(E) {
            return this.pushStack(o.isFunction(E) && o.grep(this,
            function(G, F) {
                return E.call(G, F)
            }) || o.multiFilter(E, o.grep(this,
            function(F) {
                return F.nodeType === 1
            })), "filter", E)
        },
        closest: function(E) {
            var G = o.expr.match.POS.test(E) ? o(E) : null,
            F = 0;
            return this.map(function() {
                var H = this;
                while (H && H.ownerDocument) {
                    if (G ? G.index(H) > -1 : o(H).is(E)) {
                        o.data(H, "closest", F);
                        return H
                    }
                    H = H.parentNode;
                    F++
                }
            })
        },
        not: function(E) {
            if (typeof E === "string") {
                if (f.test(E)) {
                    return this.pushStack(o.multiFilter(E, this, true), "not", E)
                } else {
                    E = o.multiFilter(E, this)
                }
            }
            var F = E.length && E[E.length - 1] !== g && !E.nodeType;
            return this.filter(function() {
                return F ? o.inArray(this, E) < 0 : this != E
            })
        },
        add: function(E) {
            return this.pushStack(o.unique(o.merge(this.get(), typeof E === "string" ? o(E) : o.makeArray(E))))
        },
        is: function(E) {
            return !! E && o.multiFilter(E, this).length > 0
        },
        hasClass: function(E) {
            return !! E && this.is("." + E)
        },
        val: function(K) {
            if (K === g) {
                var E = this[0];
                if (E) {
                    if (o.nodeName(E, "option")) {
                        return (E.attributes.value || {}).specified ? E.value: E.text
                    }
                    if (o.nodeName(E, "select")) {
                        var I = E.selectedIndex,
                        L = [],
                        M = E.options,
                        H = E.type == "select-one";
                        if (I < 0) {
                            return null
                        }
                        for (var F = H ? I: 0, J = H ? I + 1 : M.length; F < J; F++) {
                            var G = M[F];
                            if (G.selected) {
                                K = o(G).val();
                                if (H) {
                                    return K
                                }
                                L.push(K)
                            }
                        }
                        return L
                    }
                    return (E.value || "").replace(/\r/g, "")
                }
                return g
            }
            if (typeof K === "number") {
                K += ""
            }
            return this.each(function() {
                if (this.nodeType != 1) {
                    return
                }
                if (o.isArray(K) && /radio|checkbox/.test(this.type)) {
                    this.checked = (o.inArray(this.value, K) >= 0 || o.inArray(this.name, K) >= 0)
                } else {
                    if (o.nodeName(this, "select")) {
                        var N = o.makeArray(K);
                        o("option", this).each(function() {
                            this.selected = (o.inArray(this.value, N) >= 0 || o.inArray(this.text, N) >= 0)
                        });
                        if (!N.length) {
                            this.selectedIndex = -1
                        }
                    } else {
                        this.value = K
                    }
                }
            })
        },
        html: function(E) {
            return E === g ? (this[0] ? this[0].innerHTML.replace(/ jQuery\d+="(?:\d+|null)"/g, "") : null) : this.empty().append(E)
        },
        replaceWith: function(E) {
            return this.after(E).remove()
        },
        eq: function(E) {
            return this.slice(E, +E + 1)
        },
        slice: function() {
            return this.pushStack(Array.prototype.slice.apply(this, arguments), "slice", Array.prototype.slice.call(arguments).join(","))
        },
        map: function(E) {
            return this.pushStack(o.map(this,
            function(G, F) {
                return E.call(G, F, G)
            }))
        },
        andSelf: function() {
            return this.add(this.prevObject)
        },
        domManip: function(J, M, L) {
            if (this[0]) {
                var I = (this[0].ownerDocument || this[0]).createDocumentFragment(),
                F = o.clean(J, (this[0].ownerDocument || this[0]), I),
                H = I.firstChild;
                if (H) {
                    for (var G = 0,
                    E = this.length; G < E; G++) {
                        L.call(K(this[G], H), this.length > 1 || G > 0 ? I.cloneNode(true) : I)
                    }
                }
                if (F) {
                    o.each(F, z)
                }
            }
            return this;
            function K(N, O) {
                return M && o.nodeName(N, "table") && o.nodeName(O, "tr") ? (N.getElementsByTagName("tbody")[0] || N.appendChild(N.ownerDocument.createElement("tbody"))) : N
            }
        }
    };
    o.fn.init.prototype = o.fn;
    function z(E, F) {
        if (F.src) {
            o.ajax({
                url: F.src,
                async: false,
                dataType: "script"
            })
        } else {
            o.globalEval(F.text || F.textContent || F.innerHTML || "")
        }
        if (F.parentNode) {
            F.parentNode.removeChild(F)
        }
    }
    function e() {
        return + new Date
    }
    o.extend = o.fn.extend = function() {
        var J = arguments[0] || {},
        H = 1,
        I = arguments.length,
        E = false,
        G;
        if (typeof J === "boolean") {
            E = J;
            J = arguments[1] || {};
            H = 2
        }
        if (typeof J !== "object" && !o.isFunction(J)) {
            J = {}
        }
        if (I == H) {
            J = this; --H
        }
        for (; H < I; H++) {
            if ((G = arguments[H]) != null) {
                for (var F in G) {
                    var K = J[F],
                    L = G[F];
                    if (J === L) {
                        continue
                    }
                    if (E && L && typeof L === "object" && !L.nodeType) {
                        J[F] = o.extend(E, K || (L.length != null ? [] : {}), L)
                    } else {
                        if (L !== g) {
                            J[F] = L
                        }
                    }
                }
            }
        }
        return J
    };
    var b = /z-?index|font-?weight|opacity|zoom|line-?height/i,
    q = document.defaultView || {},
    s = Object.prototype.toString;
    o.extend({
        noConflict: function(E) {
            l.$ = p;
            if (E) {
                l.jQuery = y
            }
            return o
        },
        isFunction: function(E) {
            return s.call(E) === "[object Function]"
        },
        isArray: function(E) {
            return s.call(E) === "[object Array]"
        },
        isXMLDoc: function(E) {
            return E.nodeType === 9 && E.documentElement.nodeName !== "HTML" || !!E.ownerDocument && o.isXMLDoc(E.ownerDocument)
        },
        globalEval: function(G) {
            if (G && /\S/.test(G)) {
                var F = document.getElementsByTagName("head")[0] || document.documentElement,
                E = document.createElement("script");
                E.type = "text/javascript";
                if (o.support.scriptEval) {
                    E.appendChild(document.createTextNode(G))
                } else {
                    E.text = G
                }
                F.insertBefore(E, F.firstChild);
                F.removeChild(E)
            }
        },
        nodeName: function(F, E) {
            return F.nodeName && F.nodeName.toUpperCase() == E.toUpperCase()
        },
        each: function(G, K, F) {
            var E, H = 0,
            I = G.length;
            if (F) {
                if (I === g) {
                    for (E in G) {
                        if (K.apply(G[E], F) === false) {
                            break
                        }
                    }
                } else {
                    for (; H < I;) {
                        if (K.apply(G[H++], F) === false) {
                            break
                        }
                    }
                }
            } else {
                if (I === g) {
                    for (E in G) {
                        if (K.call(G[E], E, G[E]) === false) {
                            break
                        }
                    }
                } else {
                    for (var J = G[0]; H < I && K.call(J, H, J) !== false; J = G[++H]) {}
                }
            }
            return G
        },
        prop: function(H, I, G, F, E) {
            if (o.isFunction(I)) {
                I = I.call(H, F)
            }
            return typeof I === "number" && G == "curCSS" && !b.test(E) ? I + "px": I
        },
        className: {
            add: function(E, F) {
                o.each((F || "").split(/\s+/),
                function(G, H) {
                    if (E.nodeType == 1 && !o.className.has(E.className, H)) {
                        E.className += (E.className ? " ": "") + H
                    }
                })
            },
            remove: function(E, F) {
                if (E.nodeType == 1) {
                    E.className = F !== g ? o.grep(E.className.split(/\s+/),
                    function(G) {
                        return ! o.className.has(F, G)
                    }).join(" ") : ""
                }
            },
            has: function(F, E) {
                return F && o.inArray(E, (F.className || F).toString().split(/\s+/)) > -1
            }
        },
        swap: function(H, G, I) {
            var E = {};
            for (var F in G) {
                E[F] = H.style[F];
                H.style[F] = G[F]
            }
            I.call(H);
            for (var F in G) {
                H.style[F] = E[F]
            }
        },
        css: function(H, F, J, E) {
            if (F == "width" || F == "height") {
                var L, G = {
                    position: "absolute",
                    visibility: "hidden",
                    display: "block"
                },
                K = F == "width" ? ["Left", "Right"] : ["Top", "Bottom"];
                function I() {
                    L = F == "width" ? H.offsetWidth: H.offsetHeight;
                    if (E === "border") {
                        return
                    }
                    o.each(K,
                    function() {
                        if (!E) {
                            L -= parseFloat(o.curCSS(H, "padding" + this, true)) || 0
                        }
                        if (E === "margin") {
                            L += parseFloat(o.curCSS(H, "margin" + this, true)) || 0
                        } else {
                            L -= parseFloat(o.curCSS(H, "border" + this + "Width", true)) || 0
                        }
                    })
                }
                if (H.offsetWidth !== 0) {
                    I()
                } else {
                    o.swap(H, G, I)
                }
                return Math.max(0, Math.round(L))
            }
            return o.curCSS(H, F, J)
        },
        curCSS: function(I, F, G) {
            var L, E = I.style;
            if (F == "opacity" && !o.support.opacity) {
                L = o.attr(E, "opacity");
                return L == "" ? "1": L
            }
            if (F.match(/float/i)) {
                F = w
            }
            if (!G && E && E[F]) {
                L = E[F]
            } else {
                if (q.getComputedStyle) {
                    if (F.match(/float/i)) {
                        F = "float"
                    }
                    F = F.replace(/([A-Z])/g, "-$1").toLowerCase();
                    var M = q.getComputedStyle(I, null);
                    if (M) {
                        L = M.getPropertyValue(F)
                    }
                    if (F == "opacity" && L == "") {
                        L = "1"
                    }
                } else {
                    if (I.currentStyle) {
                        var J = F.replace(/\-(\w)/g,
                        function(N, O) {
                            return O.toUpperCase()
                        });
                        L = I.currentStyle[F] || I.currentStyle[J];
                        if (!/^\d+(px)?$/i.test(L) && /^\d/.test(L)) {
                            var H = E.left,
                            K = I.runtimeStyle.left;
                            I.runtimeStyle.left = I.currentStyle.left;
                            E.left = L || 0;
                            L = E.pixelLeft + "px";
                            E.left = H;
                            I.runtimeStyle.left = K
                        }
                    }
                }
            }
            return L
        },
        clean: function(F, K, I) {
            K = K || document;
            if (typeof K.createElement === "undefined") {
                K = K.ownerDocument || K[0] && K[0].ownerDocument || document
            }
            if (!I && F.length === 1 && typeof F[0] === "string") {
                var H = /^<(\w+)\s*\/?>$/.exec(F[0]);
                if (H) {
                    return [K.createElement(H[1])]
                }
            }
            var G = [],
            E = [],
            L = K.createElement("div");
            o.each(F,
            function(P, S) {
                if (typeof S === "number") {
                    S += ""
                }
                if (!S) {
                    return
                }
                if (typeof S === "string") {
                    S = S.replace(/(<(\w+)[^>]*?)\/>/g,
                    function(U, V, T) {
                        return T.match(/^(abbr|br|col|img|input|link|meta|param|hr|area|embed)$/i) ? U: V + "></" + T + ">"
                    });
                    var O = S.replace(/^\s+/, "").substring(0, 10).toLowerCase();
                    var Q = !O.indexOf("<opt") && [1, "<select multiple='multiple'>", "</select>"] || !O.indexOf("<leg") && [1, "<fieldset>", "</fieldset>"] || O.match(/^<(thead|tbody|tfoot|colg|cap)/) && [1, "<table>", "</table>"] || !O.indexOf("<tr") && [2, "<table><tbody>", "</tbody></table>"] || (!O.indexOf("<td") || !O.indexOf("<th")) && [3, "<table><tbody><tr>", "</tr></tbody></table>"] || !O.indexOf("<col") && [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"] || !o.support.htmlSerialize && [1, "div<div>", "</div>"] || [0, "", ""];
                    L.innerHTML = Q[1] + S + Q[2];
                    while (Q[0]--) {
                        L = L.lastChild
                    }
                    if (!o.support.tbody) {
                        var R = /<tbody/i.test(S),
                        N = !O.indexOf("<table") && !R ? L.firstChild && L.firstChild.childNodes: Q[1] == "<table>" && !R ? L.childNodes: [];
                        for (var M = N.length - 1; M >= 0; --M) {
                            if (o.nodeName(N[M], "tbody") && !N[M].childNodes.length) {
                                N[M].parentNode.removeChild(N[M])
                            }
                        }
                    }
                    if (!o.support.leadingWhitespace && /^\s/.test(S)) {
                        L.insertBefore(K.createTextNode(S.match(/^\s*/)[0]), L.firstChild)
                    }
                    S = o.makeArray(L.childNodes)
                }
                if (S.nodeType) {
                    G.push(S)
                } else {
                    G = o.merge(G, S)
                }
            });
            if (I) {
                for (var J = 0; G[J]; J++) {
                    if (o.nodeName(G[J], "script") && (!G[J].type || G[J].type.toLowerCase() === "text/javascript")) {
                        E.push(G[J].parentNode ? G[J].parentNode.removeChild(G[J]) : G[J])
                    } else {
                        if (G[J].nodeType === 1) {
                            G.splice.apply(G, [J + 1, 0].concat(o.makeArray(G[J].getElementsByTagName("script"))))
                        }
                        I.appendChild(G[J])
                    }
                }
                return E
            }
            return G
        },
        attr: function(J, G, K) {
            if (!J || J.nodeType == 3 || J.nodeType == 8) {
                return g
            }
            var H = !o.isXMLDoc(J),
            L = K !== g;
            G = H && o.props[G] || G;
            if (J.tagName) {
                var F = /href|src|style/.test(G);
                if (G == "selected" && J.parentNode) {
                    J.parentNode.selectedIndex
                }
                if (G in J && H && !F) {
                    if (L) {
                        if (G == "type" && o.nodeName(J, "input") && J.parentNode) {
                            throw "type property can't be changed"
                        }
                        J[G] = K
                    }
                    if (o.nodeName(J, "form") && J.getAttributeNode(G)) {
                        return J.getAttributeNode(G).nodeValue
                    }
                    if (G == "tabIndex") {
                        var I = J.getAttributeNode("tabIndex");
                        return I && I.specified ? I.value: J.nodeName.match(/(button|input|object|select|textarea)/i) ? 0 : J.nodeName.match(/^(a|area)$/i) && J.href ? 0 : g
                    }
                    return J[G]
                }
                if (!o.support.style && H && G == "style") {
                    return o.attr(J.style, "cssText", K)
                }
                if (L) {
                    J.setAttribute(G, "" + K)
                }
                var E = !o.support.hrefNormalized && H && F ? J.getAttribute(G, 2) : J.getAttribute(G);
                return E === null ? g: E
            }
            if (!o.support.opacity && G == "opacity") {
                if (L) {
                    J.zoom = 1;
                    J.filter = (J.filter || "").replace(/alpha\([^)]*\)/, "") + (parseInt(K) + "" == "NaN" ? "": "alpha(opacity=" + K * 100 + ")")
                }
                return J.filter && J.filter.indexOf("opacity=") >= 0 ? (parseFloat(J.filter.match(/opacity=([^)]*)/)[1]) / 100) + "": ""
            }
            G = G.replace(/-([a-z])/ig,
            function(M, N) {
                return N.toUpperCase()
            });
            if (L) {
                J[G] = K
            }
            return J[G]
        },
        trim: function(E) {
            return (E || "").replace(/^\s+|\s+$/g, "")
        },
        makeArray: function(G) {
            var E = [];
            if (G != null) {
                var F = G.length;
                if (F == null || typeof G === "string" || o.isFunction(G) || G.setInterval) {
                    E[0] = G
                } else {
                    while (F) {
                        E[--F] = G[F]
                    }
                }
            }
            return E
        },
        inArray: function(G, H) {
            for (var E = 0,
            F = H.length; E < F; E++) {
                if (H[E] === G) {
                    return E
                }
            }
            return - 1
        },
        merge: function(H, E) {
            var F = 0,
            G, I = H.length;
            if (!o.support.getAll) {
                while ((G = E[F++]) != null) {
                    if (G.nodeType != 8) {
                        H[I++] = G
                    }
                }
            } else {
                while ((G = E[F++]) != null) {
                    H[I++] = G
                }
            }
            return H
        },
        unique: function(K) {
            var F = [],
            E = {};
            try {
                for (var G = 0,
                H = K.length; G < H; G++) {
                    var J = o.data(K[G]);
                    if (!E[J]) {
                        E[J] = true;
                        F.push(K[G])
                    }
                }
            } catch(I) {
                F = K
            }
            return F
        },
        grep: function(F, J, E) {
            var G = [];
            for (var H = 0,
            I = F.length; H < I; H++) {
                if (!E != !J(F[H], H)) {
                    G.push(F[H])
                }
            }
            return G
        },
        map: function(E, J) {
            var F = [];
            for (var G = 0,
            H = E.length; G < H; G++) {
                var I = J(E[G], G);
                if (I != null) {
                    F[F.length] = I
                }
            }
            return F.concat.apply([], F)
        }
    });
    var C = navigator.userAgent.toLowerCase();
    o.browser = {
        version: (C.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [0, "0"])[1],
        safari: /webkit/.test(C),
        opera: /opera/.test(C),
        msie: /msie/.test(C) && !/opera/.test(C),
        mozilla: /mozilla/.test(C) && !/(compatible|webkit)/.test(C)
    };
    o.each({
        parent: function(E) {
            return E.parentNode
        },
        parents: function(E) {
            return o.dir(E, "parentNode")
        },
        next: function(E) {
            return o.nth(E, 2, "nextSibling")
        },
        prev: function(E) {
            return o.nth(E, 2, "previousSibling")
        },
        nextAll: function(E) {
            return o.dir(E, "nextSibling")
        },
        prevAll: function(E) {
            return o.dir(E, "previousSibling")
        },
        siblings: function(E) {
            return o.sibling(E.parentNode.firstChild, E)
        },
        children: function(E) {
            return o.sibling(E.firstChild)
        },
        contents: function(E) {
            return o.nodeName(E, "iframe") ? E.contentDocument || E.contentWindow.document: o.makeArray(E.childNodes)
        }
    },
    function(E, F) {
        o.fn[E] = function(G) {
            var H = o.map(this, F);
            if (G && typeof G == "string") {
                H = o.multiFilter(G, H)
            }
            return this.pushStack(o.unique(H), E, G)
        }
    });
    o.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    },
    function(E, F) {
        o.fn[E] = function(G) {
            var J = [],
            L = o(G);
            for (var K = 0,
            H = L.length; K < H; K++) {
                var I = (K > 0 ? this.clone(true) : this).get();
                o.fn[F].apply(o(L[K]), I);
                J = J.concat(I)
            }
            return this.pushStack(J, E, G)
        }
    });
    o.each({
        removeAttr: function(E) {
            o.attr(this, E, "");
            if (this.nodeType == 1) {
                this.removeAttribute(E)
            }
        },
        addClass: function(E) {
            o.className.add(this, E)
        },
        removeClass: function(E) {
            o.className.remove(this, E)
        },
        toggleClass: function(F, E) {
            if (typeof E !== "boolean") {
                E = !o.className.has(this, F)
            }
            o.className[E ? "add": "remove"](this, F)
        },
        remove: function(E) {
            if (!E || o.filter(E, [this]).length) {
                o("*", this).add([this]).each(function() {
                    o.event.remove(this);
                    o.removeData(this)
                });
                if (this.parentNode) {
                    this.parentNode.removeChild(this)
                }
            }
        },
        empty: function() {
            o(this).children().remove();
            while (this.firstChild) {
                this.removeChild(this.firstChild)
            }
        }
    },
    function(E, F) {
        o.fn[E] = function() {
            return this.each(F, arguments)
        }
    });
    function j(E, F) {
        return E[0] && parseInt(o.curCSS(E[0], F, true), 10) || 0
    }
    var h = "jQuery" + e(),
    v = 0,
    A = {};
    o.extend({
        cache: {},
        data: function(F, E, G) {
            F = F == l ? A: F;
            var H = F[h];
            if (!H) {
                H = F[h] = ++v
            }
            if (E && !o.cache[H]) {
                o.cache[H] = {}
            }
            if (G !== g) {
                o.cache[H][E] = G
            }
            return E ? o.cache[H][E] : H
        },
        removeData: function(F, E) {
            F = F == l ? A: F;
            var H = F[h];
            if (E) {
                if (o.cache[H]) {
                    delete o.cache[H][E];
                    E = "";
                    for (E in o.cache[H]) {
                        break
                    }
                    if (!E) {
                        o.removeData(F)
                    }
                }
            } else {
                try {
                    delete F[h]
                } catch(G) {
                    if (F.removeAttribute) {
                        F.removeAttribute(h)
                    }
                }
                delete o.cache[H]
            }
        },
        queue: function(F, E, H) {
            if (F) {
                E = (E || "fx") + "queue";
                var G = o.data(F, E);
                if (!G || o.isArray(H)) {
                    G = o.data(F, E, o.makeArray(H))
                } else {
                    if (H) {
                        G.push(H)
                    }
                }
            }
            return G
        },
        dequeue: function(H, G) {
            var E = o.queue(H, G),
            F = E.shift();
            if (!G || G === "fx") {
                F = E[0]
            }
            if (F !== g) {
                F.call(H)
            }
        }
    });
    o.fn.extend({
        data: function(E, G) {
            var H = E.split(".");
            H[1] = H[1] ? "." + H[1] : "";
            if (G === g) {
                var F = this.triggerHandler("getData" + H[1] + "!", [H[0]]);
                if (F === g && this.length) {
                    F = o.data(this[0], E)
                }
                return F === g && H[1] ? this.data(H[0]) : F
            } else {
                return this.trigger("setData" + H[1] + "!", [H[0], G]).each(function() {
                    o.data(this, E, G)
                })
            }
        },
        removeData: function(E) {
            return this.each(function() {
                o.removeData(this, E)
            })
        },
        queue: function(E, F) {
            if (typeof E !== "string") {
                F = E;
                E = "fx"
            }
            if (F === g) {
                return o.queue(this[0], E)
            }
            return this.each(function() {
                var G = o.queue(this, E, F);
                if (E == "fx" && G.length == 1) {
                    G[0].call(this)
                }
            })
        },
        dequeue: function(E) {
            return this.each(function() {
                o.dequeue(this, E)
            })
        }
    }); (function() {
        var R = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^[\]]*\]|['"][^'"]*['"]|[^[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?/g,
        L = 0,
        H = Object.prototype.toString;
        var F = function(Y, U, ab, ac) {
            ab = ab || [];
            U = U || document;
            if (U.nodeType !== 1 && U.nodeType !== 9) {
                return []
            }
            if (!Y || typeof Y !== "string") {
                return ab
            }
            var Z = [],
            W,
            af,
            ai,
            T,
            ad,
            V,
            X = true;
            R.lastIndex = 0;
            while ((W = R.exec(Y)) !== null) {
                Z.push(W[1]);
                if (W[2]) {
                    V = RegExp.rightContext;
                    break
                }
            }
            if (Z.length > 1 && M.exec(Y)) {
                if (Z.length === 2 && I.relative[Z[0]]) {
                    af = J(Z[0] + Z[1], U)
                } else {
                    af = I.relative[Z[0]] ? [U] : F(Z.shift(), U);
                    while (Z.length) {
                        Y = Z.shift();
                        if (I.relative[Y]) {
                            Y += Z.shift()
                        }
                        af = J(Y, af)
                    }
                }
            } else {
                var ae = ac ? {
                    expr: Z.pop(),
                    set: E(ac)
                }: F.find(Z.pop(), Z.length === 1 && U.parentNode ? U.parentNode: U, Q(U));
                af = F.filter(ae.expr, ae.set);
                if (Z.length > 0) {
                    ai = E(af)
                } else {
                    X = false
                }
                while (Z.length) {
                    var ah = Z.pop(),
                    ag = ah;
                    if (!I.relative[ah]) {
                        ah = ""
                    } else {
                        ag = Z.pop()
                    }
                    if (ag == null) {
                        ag = U
                    }
                    I.relative[ah](ai, ag, Q(U))
                }
            }
            if (!ai) {
                ai = af
            }
            if (!ai) {
                throw "Syntax error, unrecognized expression: " + (ah || Y)
            }
            if (H.call(ai) === "[object Array]") {
                if (!X) {
                    ab.push.apply(ab, ai)
                } else {
                    if (U.nodeType === 1) {
                        for (var aa = 0; ai[aa] != null; aa++) {
                            if (ai[aa] && (ai[aa] === true || ai[aa].nodeType === 1 && K(U, ai[aa]))) {
                                ab.push(af[aa])
                            }
                        }
                    } else {
                        for (var aa = 0; ai[aa] != null; aa++) {
                            if (ai[aa] && ai[aa].nodeType === 1) {
                                ab.push(af[aa])
                            }
                        }
                    }
                }
            } else {
                E(ai, ab)
            }
            if (V) {
                F(V, U, ab, ac);
                if (G) {
                    hasDuplicate = false;
                    ab.sort(G);
                    if (hasDuplicate) {
                        for (var aa = 1; aa < ab.length; aa++) {
                            if (ab[aa] === ab[aa - 1]) {
                                ab.splice(aa--, 1)
                            }
                        }
                    }
                }
            }
            return ab
        };
        F.matches = function(T, U) {
            return F(T, null, null, U)
        };
        F.find = function(aa, T, ab) {
            var Z, X;
            if (!aa) {
                return []
            }
            for (var W = 0,
            V = I.order.length; W < V; W++) {
                var Y = I.order[W],
                X;
                if ((X = I.match[Y].exec(aa))) {
                    var U = RegExp.leftContext;
                    if (U.substr(U.length - 1) !== "\\") {
                        X[1] = (X[1] || "").replace(/\\/g, "");
                        Z = I.find[Y](X, T, ab);
                        if (Z != null) {
                            aa = aa.replace(I.match[Y], "");
                            break
                        }
                    }
                }
            }
            if (!Z) {
                Z = T.getElementsByTagName("*")
            }
            return {
                set: Z,
                expr: aa
            }
        };
        F.filter = function(ad, ac, ag, W) {
            var V = ad,
            ai = [],
            aa = ac,
            Y,
            T,
            Z = ac && ac[0] && Q(ac[0]);
            while (ad && ac.length) {
                for (var ab in I.filter) {
                    if ((Y = I.match[ab].exec(ad)) != null) {
                        var U = I.filter[ab],
                        ah,
                        af;
                        T = false;
                        if (aa == ai) {
                            ai = []
                        }
                        if (I.preFilter[ab]) {
                            Y = I.preFilter[ab](Y, aa, ag, ai, W, Z);
                            if (!Y) {
                                T = ah = true
                            } else {
                                if (Y === true) {
                                    continue
                                }
                            }
                        }
                        if (Y) {
                            for (var X = 0; (af = aa[X]) != null; X++) {
                                if (af) {
                                    ah = U(af, Y, X, aa);
                                    var ae = W ^ !!ah;
                                    if (ag && ah != null) {
                                        if (ae) {
                                            T = true
                                        } else {
                                            aa[X] = false
                                        }
                                    } else {
                                        if (ae) {
                                            ai.push(af);
                                            T = true
                                        }
                                    }
                                }
                            }
                        }
                        if (ah !== g) {
                            if (!ag) {
                                aa = ai
                            }
                            ad = ad.replace(I.match[ab], "");
                            if (!T) {
                                return []
                            }
                            break
                        }
                    }
                }
                if (ad == V) {
                    if (T == null) {
                        throw "Syntax error, unrecognized expression: " + ad
                    } else {
                        break
                    }
                }
                V = ad
            }
            return aa
        };
        var I = F.selectors = {
            order: ["ID", "NAME", "TAG"],
            match: {
                ID: /#((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,
                CLASS: /\.((?:[\w\u00c0-\uFFFF_-]|\\.)+)/,
                NAME: /\[name=['"]*((?:[\w\u00c0-\uFFFF_-]|\\.)+)['"]*\]/,
                ATTR: /\[\s*((?:[\w\u00c0-\uFFFF_-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,
                TAG: /^((?:[\w\u00c0-\uFFFF\*_-]|\\.)+)/,
                CHILD: /:(only|nth|last|first)-child(?:\((even|odd|[\dn+-]*)\))?/,
                POS: /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^-]|$)/,
                PSEUDO: /:((?:[\w\u00c0-\uFFFF_-]|\\.)+)(?:\((['"]*)((?:\([^\)]+\)|[^\2\(\)]*)+)\2\))?/
            },
            attrMap: {
                "class": "className",
                "for": "htmlFor"
            },
            attrHandle: {
                href: function(T) {
                    return T.getAttribute("href")
                }
            },
            relative: {
                "+": function(aa, T, Z) {
                    var X = typeof T === "string",
                    ab = X && !/\W/.test(T),
                    Y = X && !ab;
                    if (ab && !Z) {
                        T = T.toUpperCase()
                    }
                    for (var W = 0,
                    V = aa.length,
                    U; W < V; W++) {
                        if ((U = aa[W])) {
                            while ((U = U.previousSibling) && U.nodeType !== 1) {}
                            aa[W] = Y || U && U.nodeName === T ? U || false: U === T
                        }
                    }
                    if (Y) {
                        F.filter(T, aa, true)
                    }
                },
                ">": function(Z, U, aa) {
                    var X = typeof U === "string";
                    if (X && !/\W/.test(U)) {
                        U = aa ? U: U.toUpperCase();
                        for (var V = 0,
                        T = Z.length; V < T; V++) {
                            var Y = Z[V];
                            if (Y) {
                                var W = Y.parentNode;
                                Z[V] = W.nodeName === U ? W: false
                            }
                        }
                    } else {
                        for (var V = 0,
                        T = Z.length; V < T; V++) {
                            var Y = Z[V];
                            if (Y) {
                                Z[V] = X ? Y.parentNode: Y.parentNode === U
                            }
                        }
                        if (X) {
                            F.filter(U, Z, true)
                        }
                    }
                },
                "": function(W, U, Y) {
                    var V = L++,
                    T = S;
                    if (!U.match(/\W/)) {
                        var X = U = Y ? U: U.toUpperCase();
                        T = P
                    }
                    T("parentNode", U, V, W, X, Y)
                },
                "~": function(W, U, Y) {
                    var V = L++,
                    T = S;
                    if (typeof U === "string" && !U.match(/\W/)) {
                        var X = U = Y ? U: U.toUpperCase();
                        T = P
                    }
                    T("previousSibling", U, V, W, X, Y)
                }
            },
            find: {
                ID: function(U, V, W) {
                    if (typeof V.getElementById !== "undefined" && !W) {
                        var T = V.getElementById(U[1]);
                        return T ? [T] : []
                    }
                },
                NAME: function(V, Y, Z) {
                    if (typeof Y.getElementsByName !== "undefined") {
                        var U = [],
                        X = Y.getElementsByName(V[1]);
                        for (var W = 0,
                        T = X.length; W < T; W++) {
                            if (X[W].getAttribute("name") === V[1]) {
                                U.push(X[W])
                            }
                        }
                        return U.length === 0 ? null: U
                    }
                },
                TAG: function(T, U) {
                    return U.getElementsByTagName(T[1])
                }
            },
            preFilter: {
                CLASS: function(W, U, V, T, Z, aa) {
                    W = " " + W[1].replace(/\\/g, "") + " ";
                    if (aa) {
                        return W
                    }
                    for (var X = 0,
                    Y; (Y = U[X]) != null; X++) {
                        if (Y) {
                            if (Z ^ (Y.className && (" " + Y.className + " ").indexOf(W) >= 0)) {
                                if (!V) {
                                    T.push(Y)
                                }
                            } else {
                                if (V) {
                                    U[X] = false
                                }
                            }
                        }
                    }
                    return false
                },
                ID: function(T) {
                    return T[1].replace(/\\/g, "")
                },
                TAG: function(U, T) {
                    for (var V = 0; T[V] === false; V++) {}
                    return T[V] && Q(T[V]) ? U[1] : U[1].toUpperCase()
                },
                CHILD: function(T) {
                    if (T[1] == "nth") {
                        var U = /(-?)(\d*)n((?:\+|-)?\d*)/.exec(T[2] == "even" && "2n" || T[2] == "odd" && "2n+1" || !/\D/.test(T[2]) && "0n+" + T[2] || T[2]);
                        T[2] = (U[1] + (U[2] || 1)) - 0;
                        T[3] = U[3] - 0
                    }
                    T[0] = L++;
                    return T
                },
                ATTR: function(X, U, V, T, Y, Z) {
                    var W = X[1].replace(/\\/g, "");
                    if (!Z && I.attrMap[W]) {
                        X[1] = I.attrMap[W]
                    }
                    if (X[2] === "~=") {
                        X[4] = " " + X[4] + " "
                    }
                    return X
                },
                PSEUDO: function(X, U, V, T, Y) {
                    if (X[1] === "not") {
                        if (X[3].match(R).length > 1 || /^\w/.test(X[3])) {
                            X[3] = F(X[3], null, null, U)
                        } else {
                            var W = F.filter(X[3], U, V, true ^ Y);
                            if (!V) {
                                T.push.apply(T, W)
                            }
                            return false
                        }
                    } else {
                        if (I.match.POS.test(X[0]) || I.match.CHILD.test(X[0])) {
                            return true
                        }
                    }
                    return X
                },
                POS: function(T) {
                    T.unshift(true);
                    return T
                }
            },
            filters: {
                enabled: function(T) {
                    return T.disabled === false && T.type !== "hidden"
                },
                disabled: function(T) {
                    return T.disabled === true
                },
                checked: function(T) {
                    return T.checked === true
                },
                selected: function(T) {
                    T.parentNode.selectedIndex;
                    return T.selected === true
                },
                parent: function(T) {
                    return !! T.firstChild
                },
                empty: function(T) {
                    return ! T.firstChild
                },
                has: function(V, U, T) {
                    return !! F(T[3], V).length
                },
                header: function(T) {
                    return /h\d/i.test(T.nodeName)
                },
                text: function(T) {
                    return "text" === T.type
                },
                radio: function(T) {
                    return "radio" === T.type
                },
                checkbox: function(T) {
                    return "checkbox" === T.type
                },
                file: function(T) {
                    return "file" === T.type
                },
                password: function(T) {
                    return "password" === T.type
                },
                submit: function(T) {
                    return "submit" === T.type
                },
                image: function(T) {
                    return "image" === T.type
                },
                reset: function(T) {
                    return "reset" === T.type
                },
                button: function(T) {
                    return "button" === T.type || T.nodeName.toUpperCase() === "BUTTON"
                },
                input: function(T) {
                    return /input|select|textarea|button/i.test(T.nodeName)
                }
            },
            setFilters: {
                first: function(U, T) {
                    return T === 0
                },
                last: function(V, U, T, W) {
                    return U === W.length - 1
                },
                even: function(U, T) {
                    return T % 2 === 0
                },
                odd: function(U, T) {
                    return T % 2 === 1
                },
                lt: function(V, U, T) {
                    return U < T[3] - 0
                },
                gt: function(V, U, T) {
                    return U > T[3] - 0
                },
                nth: function(V, U, T) {
                    return T[3] - 0 == U
                },
                eq: function(V, U, T) {
                    return T[3] - 0 == U
                }
            },
            filter: {
                PSEUDO: function(Z, V, W, aa) {
                    var U = V[1],
                    X = I.filters[U];
                    if (X) {
                        return X(Z, W, V, aa)
                    } else {
                        if (U === "contains") {
                            return (Z.textContent || Z.innerText || "").indexOf(V[3]) >= 0
                        } else {
                            if (U === "not") {
                                var Y = V[3];
                                for (var W = 0,
                                T = Y.length; W < T; W++) {
                                    if (Y[W] === Z) {
                                        return false
                                    }
                                }
                                return true
                            }
                        }
                    }
                },
                CHILD: function(T, W) {
                    var Z = W[1],
                    U = T;
                    switch (Z) {
                    case "only":
                    case "first":
                        while (U = U.previousSibling) {
                            if (U.nodeType === 1) {
                                return false
                            }
                        }
                        if (Z == "first") {
                            return true
                        }
                        U = T;
                    case "last":
                        while (U = U.nextSibling) {
                            if (U.nodeType === 1) {
                                return false
                            }
                        }
                        return true;
                    case "nth":
                        var V = W[2],
                        ac = W[3];
                        if (V == 1 && ac == 0) {
                            return true
                        }
                        var Y = W[0],
                        ab = T.parentNode;
                        if (ab && (ab.sizcache !== Y || !T.nodeIndex)) {
                            var X = 0;
                            for (U = ab.firstChild; U; U = U.nextSibling) {
                                if (U.nodeType === 1) {
                                    U.nodeIndex = ++X
                                }
                            }
                            ab.sizcache = Y
                        }
                        var aa = T.nodeIndex - ac;
                        if (V == 0) {
                            return aa == 0
                        } else {
                            return (aa % V == 0 && aa / V >= 0)
                        }
                    }
                },
                ID: function(U, T) {
                    return U.nodeType === 1 && U.getAttribute("id") === T
                },
                TAG: function(U, T) {
                    return (T === "*" && U.nodeType === 1) || U.nodeName === T
                },
                CLASS: function(U, T) {
                    return (" " + (U.className || U.getAttribute("class")) + " ").indexOf(T) > -1
                },
                ATTR: function(Y, W) {
                    var V = W[1],
                    T = I.attrHandle[V] ? I.attrHandle[V](Y) : Y[V] != null ? Y[V] : Y.getAttribute(V),
                    Z = T + "",
                    X = W[2],
                    U = W[4];
                    return T == null ? X === "!=": X === "=" ? Z === U: X === "*=" ? Z.indexOf(U) >= 0 : X === "~=" ? (" " + Z + " ").indexOf(U) >= 0 : !U ? Z && T !== false: X === "!=" ? Z != U: X === "^=" ? Z.indexOf(U) === 0 : X === "$=" ? Z.substr(Z.length - U.length) === U: X === "|=" ? Z === U || Z.substr(0, U.length + 1) === U + "-": false
                },
                POS: function(X, U, V, Y) {
                    var T = U[2],
                    W = I.setFilters[T];
                    if (W) {
                        return W(X, V, U, Y)
                    }
                }
            }
        };
        var M = I.match.POS;
        for (var O in I.match) {
            I.match[O] = RegExp(I.match[O].source + /(?![^\[]*\])(?![^\(]*\))/.source)
        }
        var E = function(U, T) {
            U = Array.prototype.slice.call(U);
            if (T) {
                T.push.apply(T, U);
                return T
            }
            return U
        };
        try {
            Array.prototype.slice.call(document.documentElement.childNodes)
        } catch(N) {
            E = function(X, W) {
                var U = W || [];
                if (H.call(X) === "[object Array]") {
                    Array.prototype.push.apply(U, X)
                } else {
                    if (typeof X.length === "number") {
                        for (var V = 0,
                        T = X.length; V < T; V++) {
                            U.push(X[V])
                        }
                    } else {
                        for (var V = 0; X[V]; V++) {
                            U.push(X[V])
                        }
                    }
                }
                return U
            }
        }
        var G;
        if (document.documentElement.compareDocumentPosition) {
            G = function(U, T) {
                var V = U.compareDocumentPosition(T) & 4 ? -1 : U === T ? 0 : 1;
                if (V === 0) {
                    hasDuplicate = true
                }
                return V
            }
        } else {
            if ("sourceIndex" in document.documentElement) {
                G = function(U, T) {
                    var V = U.sourceIndex - T.sourceIndex;
                    if (V === 0) {
                        hasDuplicate = true
                    }
                    return V
                }
            } else {
                if (document.createRange) {
                    G = function(W, U) {
                        var V = W.ownerDocument.createRange(),
                        T = U.ownerDocument.createRange();
                        V.selectNode(W);
                        V.collapse(true);
                        T.selectNode(U);
                        T.collapse(true);
                        var X = V.compareBoundaryPoints(Range.START_TO_END, T);
                        if (X === 0) {
                            hasDuplicate = true
                        }
                        return X
                    }
                }
            }
        } (function() {
            var U = document.createElement("form"),
            V = "script" + (new Date).getTime();
            U.innerHTML = "<input name='" + V + "'/>";
            var T = document.documentElement;
            T.insertBefore(U, T.firstChild);
            if ( !! document.getElementById(V)) {
                I.find.ID = function(X, Y, Z) {
                    if (typeof Y.getElementById !== "undefined" && !Z) {
                        var W = Y.getElementById(X[1]);
                        return W ? W.id === X[1] || typeof W.getAttributeNode !== "undefined" && W.getAttributeNode("id").nodeValue === X[1] ? [W] : g: []
                    }
                };
                I.filter.ID = function(Y, W) {
                    var X = typeof Y.getAttributeNode !== "undefined" && Y.getAttributeNode("id");
                    return Y.nodeType === 1 && X && X.nodeValue === W
                }
            }
            T.removeChild(U)
        })(); (function() {
            var T = document.createElement("div");
            T.appendChild(document.createComment(""));
            if (T.getElementsByTagName("*").length > 0) {
                I.find.TAG = function(U, Y) {
                    var X = Y.getElementsByTagName(U[1]);
                    if (U[1] === "*") {
                        var W = [];
                        for (var V = 0; X[V]; V++) {
                            if (X[V].nodeType === 1) {
                                W.push(X[V])
                            }
                        }
                        X = W
                    }
                    return X
                }
            }
            T.innerHTML = "<a href='#'></a>";
            if (T.firstChild && typeof T.firstChild.getAttribute !== "undefined" && T.firstChild.getAttribute("href") !== "#") {
                I.attrHandle.href = function(U) {
                    return U.getAttribute("href", 2)
                }
            }
        })();
        if (document.querySelectorAll) { (function() {
                var T = F,
                U = document.createElement("div");
                U.innerHTML = "<p class='TEST'></p>";
                if (U.querySelectorAll && U.querySelectorAll(".TEST").length === 0) {
                    return
                }
                F = function(Y, X, V, W) {
                    X = X || document;
                    if (!W && X.nodeType === 9 && !Q(X)) {
                        try {
                            return E(X.querySelectorAll(Y), V)
                        } catch(Z) {}
                    }
                    return T(Y, X, V, W)
                };
                F.find = T.find;
                F.filter = T.filter;
                F.selectors = T.selectors;
                F.matches = T.matches
            })()
        }
        if (document.getElementsByClassName && document.documentElement.getElementsByClassName) { (function() {
                var T = document.createElement("div");
                T.innerHTML = "<div class='test e'></div><div class='test'></div>";
                if (T.getElementsByClassName("e").length === 0) {
                    return
                }
                T.lastChild.className = "e";
                if (T.getElementsByClassName("e").length === 1) {
                    return
                }
                I.order.splice(1, 0, "CLASS");
                I.find.CLASS = function(U, V, W) {
                    if (typeof V.getElementsByClassName !== "undefined" && !W) {
                        return V.getElementsByClassName(U[1])
                    }
                }
            })()
        }
        function P(U, Z, Y, ad, aa, ac) {
            var ab = U == "previousSibling" && !ac;
            for (var W = 0,
            V = ad.length; W < V; W++) {
                var T = ad[W];
                if (T) {
                    if (ab && T.nodeType === 1) {
                        T.sizcache = Y;
                        T.sizset = W
                    }
                    T = T[U];
                    var X = false;
                    while (T) {
                        if (T.sizcache === Y) {
                            X = ad[T.sizset];
                            break
                        }
                        if (T.nodeType === 1 && !ac) {
                            T.sizcache = Y;
                            T.sizset = W
                        }
                        if (T.nodeName === Z) {
                            X = T;
                            break
                        }
                        T = T[U]
                    }
                    ad[W] = X
                }
            }
        }
        function S(U, Z, Y, ad, aa, ac) {
            var ab = U == "previousSibling" && !ac;
            for (var W = 0,
            V = ad.length; W < V; W++) {
                var T = ad[W];
                if (T) {
                    if (ab && T.nodeType === 1) {
                        T.sizcache = Y;
                        T.sizset = W
                    }
                    T = T[U];
                    var X = false;
                    while (T) {
                        if (T.sizcache === Y) {
                            X = ad[T.sizset];
                            break
                        }
                        if (T.nodeType === 1) {
                            if (!ac) {
                                T.sizcache = Y;
                                T.sizset = W
                            }
                            if (typeof Z !== "string") {
                                if (T === Z) {
                                    X = true;
                                    break
                                }
                            } else {
                                if (F.filter(Z, [T]).length > 0) {
                                    X = T;
                                    break
                                }
                            }
                        }
                        T = T[U]
                    }
                    ad[W] = X
                }
            }
        }
        var K = document.compareDocumentPosition ?
        function(U, T) {
            return U.compareDocumentPosition(T) & 16
        }: function(U, T) {
            return U !== T && (U.contains ? U.contains(T) : true)
        };
        var Q = function(T) {
            return T.nodeType === 9 && T.documentElement.nodeName !== "HTML" || !!T.ownerDocument && Q(T.ownerDocument)
        };
        var J = function(T, aa) {
            var W = [],
            X = "",
            Y,
            V = aa.nodeType ? [aa] : aa;
            while ((Y = I.match.PSEUDO.exec(T))) {
                X += Y[0];
                T = T.replace(I.match.PSEUDO, "")
            }
            T = I.relative[T] ? T + "*": T;
            for (var Z = 0,
            U = V.length; Z < U; Z++) {
                F(T, V[Z], W)
            }
            return F.filter(X, W)
        };
        o.find = F;
        o.filter = F.filter;
        o.expr = F.selectors;
        o.expr[":"] = o.expr.filters;
        F.selectors.filters.hidden = function(T) {
            return T.offsetWidth === 0 || T.offsetHeight === 0
        };
        F.selectors.filters.visible = function(T) {
            return T.offsetWidth > 0 || T.offsetHeight > 0
        };
        F.selectors.filters.animated = function(T) {
            return o.grep(o.timers,
            function(U) {
                return T === U.elem
            }).length
        };
        o.multiFilter = function(V, T, U) {
            if (U) {
                V = ":not(" + V + ")"
            }
            return F.matches(V, T)
        };
        o.dir = function(V, U) {
            var T = [],
            W = V[U];
            while (W && W != document) {
                if (W.nodeType == 1) {
                    T.push(W)
                }
                W = W[U]
            }
            return T
        };
        o.nth = function(X, T, V, W) {
            T = T || 1;
            var U = 0;
            for (; X; X = X[V]) {
                if (X.nodeType == 1 && ++U == T) {
                    break
                }
            }
            return X
        };
        o.sibling = function(V, U) {
            var T = [];
            for (; V; V = V.nextSibling) {
                if (V.nodeType == 1 && V != U) {
                    T.push(V)
                }
            }
            return T
        };
        return;
        l.Sizzle = F
    })();
    o.event = {
        add: function(I, F, H, K) {
            if (I.nodeType == 3 || I.nodeType == 8) {
                return
            }
            if (I.setInterval && I != l) {
                I = l
            }
            if (!H.guid) {
                H.guid = this.guid++
            }
            if (K !== g) {
                var G = H;
                H = this.proxy(G);
                H.data = K
            }
            var E = o.data(I, "events") || o.data(I, "events", {}),
            J = o.data(I, "handle") || o.data(I, "handle",
            function() {
                return typeof o !== "undefined" && !o.event.triggered ? o.event.handle.apply(arguments.callee.elem, arguments) : g
            });
            J.elem = I;
            o.each(F.split(/\s+/),
            function(M, N) {
                var O = N.split(".");
                N = O.shift();
                H.type = O.slice().sort().join(".");
                var L = E[N];
                if (o.event.specialAll[N]) {
                    o.event.specialAll[N].setup.call(I, K, O)
                }
                if (!L) {
                    L = E[N] = {};
                    if (!o.event.special[N] || o.event.special[N].setup.call(I, K, O) === false) {
                        if (I.addEventListener) {
                            I.addEventListener(N, J, false)
                        } else {
                            if (I.attachEvent) {
                                I.attachEvent("on" + N, J)
                            }
                        }
                    }
                }
                L[H.guid] = H;
                o.event.global[N] = true
            });
            I = null
        },
        guid: 1,
        global: {},
        remove: function(K, H, J) {
            if (K.nodeType == 3 || K.nodeType == 8) {
                return
            }
            var G = o.data(K, "events"),
            F,
            E;
            if (G) {
                if (H === g || (typeof H === "string" && H.charAt(0) == ".")) {
                    for (var I in G) {
                        this.remove(K, I + (H || ""))
                    }
                } else {
                    if (H.type) {
                        J = H.handler;
                        H = H.type
                    }
                    o.each(H.split(/\s+/),
                    function(M, O) {
                        var Q = O.split(".");
                        O = Q.shift();
                        var N = RegExp("(^|\\.)" + Q.slice().sort().join(".*\\.") + "(\\.|$)");
                        if (G[O]) {
                            if (J) {
                                delete G[O][J.guid]
                            } else {
                                for (var P in G[O]) {
                                    if (N.test(G[O][P].type)) {
                                        delete G[O][P]
                                    }
                                }
                            }
                            if (o.event.specialAll[O]) {
                                o.event.specialAll[O].teardown.call(K, Q)
                            }
                            for (F in G[O]) {
                                break
                            }
                            if (!F) {
                                if (!o.event.special[O] || o.event.special[O].teardown.call(K, Q) === false) {
                                    if (K.removeEventListener) {
                                        K.removeEventListener(O, o.data(K, "handle"), false)
                                    } else {
                                        if (K.detachEvent) {
                                            K.detachEvent("on" + O, o.data(K, "handle"))
                                        }
                                    }
                                }
                                F = null;
                                delete G[O]
                            }
                        }
                    })
                }
                for (F in G) {
                    break
                }
                if (!F) {
                    var L = o.data(K, "handle");
                    if (L) {
                        L.elem = null
                    }
                    o.removeData(K, "events");
                    o.removeData(K, "handle")
                }
            }
        },
        trigger: function(I, K, H, E) {
            var G = I.type || I;
            if (!E) {
                I = typeof I === "object" ? I[h] ? I: o.extend(o.Event(G), I) : o.Event(G);
                if (G.indexOf("!") >= 0) {
                    I.type = G = G.slice(0, -1);
                    I.exclusive = true
                }
                if (!H) {
                    I.stopPropagation();
                    if (this.global[G]) {
                        o.each(o.cache,
                        function() {
                            if (this.events && this.events[G]) {
                                o.event.trigger(I, K, this.handle.elem)
                            }
                        })
                    }
                }
                if (!H || H.nodeType == 3 || H.nodeType == 8) {
                    return g
                }
                I.result = g;
                I.target = H;
                K = o.makeArray(K);
                K.unshift(I)
            }
            I.currentTarget = H;
            var J = o.data(H, "handle");
            if (J) {
                J.apply(H, K)
            }
            if ((!H[G] || (o.nodeName(H, "a") && G == "click")) && H["on" + G] && H["on" + G].apply(H, K) === false) {
                I.result = false
            }
            if (!E && H[G] && !I.isDefaultPrevented() && !(o.nodeName(H, "a") && G == "click")) {
                this.triggered = true;
                try {
                    H[G]()
                } catch(L) {}
            }
            this.triggered = false;
            if (!I.isPropagationStopped()) {
                var F = H.parentNode || H.ownerDocument;
                if (F) {
                    o.event.trigger(I, K, F, true)
                }
            }
        },
        handle: function(K) {
            var J, E;
            K = arguments[0] = o.event.fix(K || l.event);
            K.currentTarget = this;
            var L = K.type.split(".");
            K.type = L.shift();
            J = !L.length && !K.exclusive;
            var I = RegExp("(^|\\.)" + L.slice().sort().join(".*\\.") + "(\\.|$)");
            E = (o.data(this, "events") || {})[K.type];
            for (var G in E) {
                var H = E[G];
                if (J || I.test(H.type)) {
                    K.handler = H;
                    K.data = H.data;
                    var F = H.apply(this, arguments);
                    if (F !== g) {
                        K.result = F;
                        if (F === false) {
                            K.preventDefault();
                            K.stopPropagation()
                        }
                    }
                    if (K.isImmediatePropagationStopped()) {
                        break
                    }
                }
            }
        },
        props: "altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode metaKey newValue originalTarget pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which".split(" "),
        fix: function(H) {
            if (H[h]) {
                return H
            }
            var F = H;
            H = o.Event(F);
            for (var G = this.props.length,
            J; G;) {
                J = this.props[--G];
                H[J] = F[J]
            }
            if (!H.target) {
                H.target = H.srcElement || document
            }
            if (H.target.nodeType == 3) {
                H.target = H.target.parentNode
            }
            if (!H.relatedTarget && H.fromElement) {
                H.relatedTarget = H.fromElement == H.target ? H.toElement: H.fromElement
            }
            if (H.pageX == null && H.clientX != null) {
                var I = document.documentElement,
                E = document.body;
                H.pageX = H.clientX + (I && I.scrollLeft || E && E.scrollLeft || 0) - (I.clientLeft || 0);
                H.pageY = H.clientY + (I && I.scrollTop || E && E.scrollTop || 0) - (I.clientTop || 0)
            }
            if (!H.which && ((H.charCode || H.charCode === 0) ? H.charCode: H.keyCode)) {
                H.which = H.charCode || H.keyCode
            }
            if (!H.metaKey && H.ctrlKey) {
                H.metaKey = H.ctrlKey
            }
            if (!H.which && H.button) {
                H.which = (H.button & 1 ? 1 : (H.button & 2 ? 3 : (H.button & 4 ? 2 : 0)))
            }
            return H
        },
        proxy: function(F, E) {
            E = E ||
            function() {
                return F.apply(this, arguments)
            };
            E.guid = F.guid = F.guid || E.guid || this.guid++;
            return E
        },
        special: {
            ready: {
                setup: B,
                teardown: function() {}
            }
        },
        specialAll: {
            live: {
                setup: function(E, F) {
                    o.event.add(this, F[0], c)
                },
                teardown: function(G) {
                    if (G.length) {
                        var E = 0,
                        F = RegExp("(^|\\.)" + G[0] + "(\\.|$)");
                        o.each((o.data(this, "events").live || {}),
                        function() {
                            if (F.test(this.type)) {
                                E++
                            }
                        });
                        if (E < 1) {
                            o.event.remove(this, G[0], c)
                        }
                    }
                }
            }
        }
    };
    o.Event = function(E) {
        if (!this.preventDefault) {
            return new o.Event(E)
        }
        if (E && E.type) {
            this.originalEvent = E;
            this.type = E.type
        } else {
            this.type = E
        }
        this.timeStamp = e();
        this[h] = true
    };
    function k() {
        return false
    }
    function u() {
        return true
    }
    o.Event.prototype = {
        preventDefault: function() {
            this.isDefaultPrevented = u;
            var E = this.originalEvent;
            if (!E) {
                return
            }
            if (E.preventDefault) {
                E.preventDefault()
            }
            E.returnValue = false
        },
        stopPropagation: function() {
            this.isPropagationStopped = u;
            var E = this.originalEvent;
            if (!E) {
                return
            }
            if (E.stopPropagation) {
                E.stopPropagation()
            }
            E.cancelBubble = true
        },
        stopImmediatePropagation: function() {
            this.isImmediatePropagationStopped = u;
            this.stopPropagation()
        },
        isDefaultPrevented: k,
        isPropagationStopped: k,
        isImmediatePropagationStopped: k
    };
    var a = function(F) {
        var E = F.relatedTarget;
        while (E && E != this) {
            try {
                E = E.parentNode
            } catch(G) {
                E = this
            }
        }
        if (E != this) {
            F.type = F.data;
            o.event.handle.apply(this, arguments)
        }
    };
    o.each({
        mouseover: "mouseenter",
        mouseout: "mouseleave"
    },
    function(F, E) {
        o.event.special[E] = {
            setup: function() {
                o.event.add(this, F, a, E)
            },
            teardown: function() {
                o.event.remove(this, F, a)
            }
        }
    });
    o.fn.extend({
        bind: function(F, G, E) {
            return F == "unload" ? this.one(F, G, E) : this.each(function() {
                o.event.add(this, F, E || G, E && G)
            })
        },
        one: function(G, H, F) {
            var E = o.event.proxy(F || H,
            function(I) {
                o(this).unbind(I, E);
                return (F || H).apply(this, arguments)
            });
            return this.each(function() {
                o.event.add(this, G, E, F && H)
            })
        },
        unbind: function(F, E) {
            return this.each(function() {
                o.event.remove(this, F, E)
            })
        },
        trigger: function(E, F) {
            return this.each(function() {
                o.event.trigger(E, F, this)
            })
        },
        triggerHandler: function(E, G) {
            if (this[0]) {
                var F = o.Event(E);
                F.preventDefault();
                F.stopPropagation();
                o.event.trigger(F, G, this[0]);
                return F.result
            }
        },
        toggle: function(G) {
            var E = arguments,
            F = 1;
            while (F < E.length) {
                o.event.proxy(G, E[F++])
            }
            return this.click(o.event.proxy(G,
            function(H) {
                this.lastToggle = (this.lastToggle || 0) % F;
                H.preventDefault();
                return E[this.lastToggle++].apply(this, arguments) || false
            }))
        },
        hover: function(E, F) {
            return this.mouseenter(E).mouseleave(F)
        },
        ready: function(E) {
            B();
            if (o.isReady) {
                E.call(document, o)
            } else {
                o.readyList.push(E)
            }
            return this
        },
        live: function(G, F) {
            var E = o.event.proxy(F);
            E.guid += this.selector + G;
            o(document).bind(i(G, this.selector), this.selector, E);
            return this
        },
        die: function(F, E) {
            o(document).unbind(i(F, this.selector), E ? {
                guid: E.guid + this.selector + F
            }: null);
            return this
        }
    });
    function c(H) {
        var E = RegExp("(^|\\.)" + H.type + "(\\.|$)"),
        G = true,
        F = [];
        o.each(o.data(this, "events").live || [],
        function(I, J) {
            if (E.test(J.type)) {
                var K = o(H.target).closest(J.data)[0];
                if (K) {
                    F.push({
                        elem: K,
                        fn: J
                    })
                }
            }
        });
        F.sort(function(J, I) {
            return o.data(J.elem, "closest") - o.data(I.elem, "closest")
        });
        o.each(F,
        function() {
            if (this.fn.call(this.elem, H, this.fn.data) === false) {
                return (G = false)
            }
        });
        return G
    }
    function i(F, E) {
        return ["live", F, E.replace(/\./g, "`").replace(/ /g, "|")].join(".")
    }
    o.extend({
        isReady: false,
        readyList: [],
        ready: function() {
            if (!o.isReady) {
                o.isReady = true;
                if (o.readyList) {
                    o.each(o.readyList,
                    function() {
                        this.call(document, o)
                    });
                    o.readyList = null
                }
                o(document).triggerHandler("ready")
            }
        }
    });
    var x = false;
    function B() {
        if (x) {
            return
        }
        x = true;
        if (document.addEventListener) {
            document.addEventListener("DOMContentLoaded",
            function() {
                document.removeEventListener("DOMContentLoaded", arguments.callee, false);
                o.ready()
            },
            false)
        } else {
            if (document.attachEvent) {
                document.attachEvent("onreadystatechange",
                function() {
                    if (document.readyState === "complete") {
                        document.detachEvent("onreadystatechange", arguments.callee);
                        o.ready()
                    }
                });
                if (document.documentElement.doScroll && l == l.top) { (function() {
                        if (o.isReady) {
                            return
                        }
                        try {
                            document.documentElement.doScroll("left")
                        } catch(E) {
                            setTimeout(arguments.callee, 0);
                            return
                        }
                        o.ready()
                    })()
                }
            }
        }
        o.event.add(l, "load", o.ready)
    }
    o.each(("blur,focus,load,resize,scroll,unload,click,dblclick,mousedown,mouseup,mousemove,mouseover,mouseout,mouseenter,mouseleave,change,select,submit,keydown,keypress,keyup,error").split(","),
    function(F, E) {
        o.fn[E] = function(G) {
            return G ? this.bind(E, G) : this.trigger(E)
        }
    });
    o(l).bind("unload",
    function() {
        for (var E in o.cache) {
            if (E != 1 && o.cache[E].handle) {
                o.event.remove(o.cache[E].handle.elem)
            }
        }
    }); (function() {
        o.support = {};
        var F = document.documentElement,
        G = document.createElement("script"),
        K = document.createElement("div"),
        J = "script" + (new Date).getTime();
        K.style.display = "none";
        K.innerHTML = '   <link/><table></table><a href="/a" style="color:red;float:left;opacity:.5;">a</a><select><option>text</option></select><object><param/></object>';
        var H = K.getElementsByTagName("*"),
        E = K.getElementsByTagName("a")[0];
        if (!H || !H.length || !E) {
            return
        }
        o.support = {
            leadingWhitespace: K.firstChild.nodeType == 3,
            tbody: !K.getElementsByTagName("tbody").length,
            objectAll: !!K.getElementsByTagName("object")[0].getElementsByTagName("*").length,
            htmlSerialize: !!K.getElementsByTagName("link").length,
            style: /red/.test(E.getAttribute("style")),
            hrefNormalized: E.getAttribute("href") === "/a",
            opacity: E.style.opacity === "0.5",
            cssFloat: !!E.style.cssFloat,
            scriptEval: false,
            noCloneEvent: true,
            boxModel: null
        };
        G.type = "text/javascript";
        try {
            G.appendChild(document.createTextNode("window." + J + "=1;"))
        } catch(I) {}
        F.insertBefore(G, F.firstChild);
        if (l[J]) {
            o.support.scriptEval = true;
            delete l[J]
        }
        F.removeChild(G);
        if (K.attachEvent && K.fireEvent) {
            K.attachEvent("onclick",
            function() {
                o.support.noCloneEvent = false;
                K.detachEvent("onclick", arguments.callee)
            });
            K.cloneNode(true).fireEvent("onclick")
        }
        o(function() {
            var L = document.createElement("div");
            L.style.width = L.style.paddingLeft = "1px";
            document.body.appendChild(L);
            o.boxModel = o.support.boxModel = L.offsetWidth === 2;
            document.body.removeChild(L).style.display = "none"
        })
    })();
    var w = o.support.cssFloat ? "cssFloat": "styleFloat";
    o.props = {
        "for": "htmlFor",
        "class": "className",
        "float": w,
        cssFloat: w,
        styleFloat: w,
        readonly: "readOnly",
        maxlength: "maxLength",
        cellspacing: "cellSpacing",
        rowspan: "rowSpan",
        tabindex: "tabIndex"
    };
    o.fn.extend({
        _load: o.fn.load,
        load: function(G, J, K) {
            if (typeof G !== "string") {
                return this._load(G)
            }
            var I = G.indexOf(" ");
            if (I >= 0) {
                var E = G.slice(I, G.length);
                G = G.slice(0, I)
            }
            var H = "GET";
            if (J) {
                if (o.isFunction(J)) {
                    K = J;
                    J = null
                } else {
                    if (typeof J === "object") {
                        J = o.param(J);
                        H = "POST"
                    }
                }
            }
            var F = this;
            o.ajax({
                url: G,
                type: H,
                dataType: "html",
                data: J,
                complete: function(M, L) {
                    if (L == "success" || L == "notmodified") {
                        F.html(E ? o("<div/>").append(M.responseText.replace(/<script(.|\s)*?\/script>/g, "")).find(E) : M.responseText)
                    }
                    if (K) {
                        F.each(K, [M.responseText, L, M])
                    }
                }
            });
            return this
        },
        serialize: function() {
            return o.param(this.serializeArray())
        },
        serializeArray: function() {
            return this.map(function() {
                return this.elements ? o.makeArray(this.elements) : this
            }).filter(function() {
                return this.name && !this.disabled && (this.checked || /select|textarea/i.test(this.nodeName) || /text|hidden|password|search/i.test(this.type))
            }).map(function(E, F) {
                var G = o(this).val();
                return G == null ? null: o.isArray(G) ? o.map(G,
                function(I, H) {
                    return {
                        name: F.name,
                        value: I
                    }
                }) : {
                    name: F.name,
                    value: G
                }
            }).get()
        }
    });
    o.each("ajaxStart,ajaxStop,ajaxComplete,ajaxError,ajaxSuccess,ajaxSend".split(","),
    function(E, F) {
        o.fn[F] = function(G) {
            return this.bind(F, G)
        }
    });
    var r = e();
    o.extend({
        get: function(E, G, H, F) {
            if (o.isFunction(G)) {
                H = G;
                G = null
            }
            return o.ajax({
                type: "GET",
                url: E,
                data: G,
                success: H,
                dataType: F
            })
        },
        getScript: function(E, F) {
            return o.get(E, null, F, "script")
        },
        getJSON: function(E, F, G) {
            return o.get(E, F, G, "json")
        },
        post: function(E, G, H, F) {
            if (o.isFunction(G)) {
                H = G;
                G = {}
            }
            return o.ajax({
                type: "POST",
                url: E,
                data: G,
                success: H,
                dataType: F
            })
        },
        ajaxSetup: function(E) {
            o.extend(o.ajaxSettings, E)
        },
        ajaxSettings: {
            url: location.href,
            global: true,
            type: "GET",
            contentType: "application/x-www-form-urlencoded",
            processData: true,
            async: true,
            xhr: function() {
                return l.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest()
            },
            accepts: {
                xml: "application/xml, text/xml",
                html: "text/html",
                script: "text/javascript, application/javascript",
                json: "application/json, text/javascript",
                text: "text/plain",
                _default: "*/*"
            }
        },
        lastModified: {},
        ajax: function(M) {
            M = o.extend(true, M, o.extend(true, {},
            o.ajaxSettings, M));
            var W, F = /=\?(&|$)/g,
            R, V, G = M.type.toUpperCase();
            if (M.data && M.processData && typeof M.data !== "string") {
                M.data = o.param(M.data)
            }
            if (M.dataType == "jsonp") {
                if (G == "GET") {
                    if (!M.url.match(F)) {
                        M.url += (M.url.match(/\?/) ? "&": "?") + (M.jsonp || "callback") + "=?"
                    }
                } else {
                    if (!M.data || !M.data.match(F)) {
                        M.data = (M.data ? M.data + "&": "") + (M.jsonp || "callback") + "=?"
                    }
                }
                M.dataType = "json"
            }
            if (M.dataType == "json" && (M.data && M.data.match(F) || M.url.match(F))) {
                W = "jsonp" + r++;
                if (M.data) {
                    M.data = (M.data + "").replace(F, "=" + W + "$1")
                }
                M.url = M.url.replace(F, "=" + W + "$1");
                M.dataType = "script";
                l[W] = function(X) {
                    V = X;
                    I();
                    L();
                    l[W] = g;
                    try {
                        delete l[W]
                    } catch(Y) {}
                    if (H) {
                        H.removeChild(T)
                    }
                }
            }
            if (M.dataType == "script" && M.cache == null) {
                M.cache = false
            }
            if (M.cache === false && G == "GET") {
                var E = e();
                var U = M.url.replace(/(\?|&)_=.*?(&|$)/, "$1_=" + E + "$2");
                M.url = U + ((U == M.url) ? (M.url.match(/\?/) ? "&": "?") + "_=" + E: "")
            }
            if (M.data && G == "GET") {
                M.url += (M.url.match(/\?/) ? "&": "?") + M.data;
                M.data = null
            }
            if (M.global && !o.active++) {
                o.event.trigger("ajaxStart")
            }
            var Q = /^(\w+:)?\/\/([^\/?#]+)/.exec(M.url);
            if (M.dataType == "script" && G == "GET" && Q && (Q[1] && Q[1] != location.protocol || Q[2] != location.host)) {
                var H = document.getElementsByTagName("head")[0];
                var T = document.createElement("script");
                T.src = M.url;
                if (M.scriptCharset) {
                    T.charset = M.scriptCharset
                }
                if (!W) {
                    var O = false;
                    T.onload = T.onreadystatechange = function() {
                        if (!O && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {
                            O = true;
                            I();
                            L();
                            T.onload = T.onreadystatechange = null;
                            H.removeChild(T)
                        }
                    }
                }
                H.appendChild(T);
                return g
            }
            var K = false;
            var J = M.xhr();
            if (M.username) {
                J.open(G, M.url, M.async, M.username, M.password)
            } else {
                J.open(G, M.url, M.async)
            }
            try {
                if (M.data) {
                    J.setRequestHeader("Content-Type", M.contentType)
                }
                if (M.ifModified) {
                    J.setRequestHeader("If-Modified-Since", o.lastModified[M.url] || "Thu, 01 Jan 1970 00:00:00 GMT")
                }
                J.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                J.setRequestHeader("Accept", M.dataType && M.accepts[M.dataType] ? M.accepts[M.dataType] + ", */*": M.accepts._default)
            } catch(S) {}
            if (M.beforeSend && M.beforeSend(J, M) === false) {
                if (M.global && !--o.active) {
                    o.event.trigger("ajaxStop")
                }
                J.abort();
                return false
            }
            if (M.global) {
                o.event.trigger("ajaxSend", [J, M])
            }
            var N = function(X) {
                if (J.readyState == 0) {
                    if (P) {
                        clearInterval(P);
                        P = null;
                        if (M.global && !--o.active) {
                            o.event.trigger("ajaxStop")
                        }
                    }
                } else {
                    if (!K && J && (J.readyState == 4 || X == "timeout")) {
                        K = true;
                        if (P) {
                            clearInterval(P);
                            P = null
                        }
                        R = X == "timeout" ? "timeout": !o.httpSuccess(J) ? "error": M.ifModified && o.httpNotModified(J, M.url) ? "notmodified": "success";
                        if (R == "success") {
                            try {
                                V = o.httpData(J, M.dataType, M)
                            } catch(Z) {
                                R = "parsererror"
                            }
                        }
                        if (R == "success") {
                            var Y;
                            try {
                                Y = J.getResponseHeader("Last-Modified")
                            } catch(Z) {}
                            if (M.ifModified && Y) {
                                o.lastModified[M.url] = Y
                            }
                            if (!W) {
                                I()
                            }
                        } else {
                            o.handleError(M, J, R)
                        }
                        L();
                        if (X) {
                            J.abort()
                        }
                        if (M.async) {
                            J = null
                        }
                    }
                }
            };
            if (M.async) {
                var P = setInterval(N, 13);
                if (M.timeout > 0) {
                    setTimeout(function() {
                        if (J && !K) {
                            N("timeout")
                        }
                    },
                    M.timeout)
                }
            }
            try {
                J.send(M.data)
            } catch(S) {
                o.handleError(M, J, null, S)
            }
            if (!M.async) {
                N()
            }
            function I() {
                if (M.success) {
                    M.success(V, R)
                }
                if (M.global) {
                    o.event.trigger("ajaxSuccess", [J, M])
                }
            }
            function L() {
                if (M.complete) {
                    M.complete(J, R)
                }
                if (M.global) {
                    o.event.trigger("ajaxComplete", [J, M])
                }
                if (M.global && !--o.active) {
                    o.event.trigger("ajaxStop")
                }
            }
            return J
        },
        handleError: function(F, H, E, G) {
            if (F.error) {
                F.error(H, E, G)
            }
            if (F.global) {
                o.event.trigger("ajaxError", [H, F, G])
            }
        },
        active: 0,
        httpSuccess: function(F) {
            try {
                return ! F.status && location.protocol == "file:" || (F.status >= 200 && F.status < 300) || F.status == 304 || F.status == 1223
            } catch(E) {}
            return false
        },
        httpNotModified: function(G, E) {
            try {
                var H = G.getResponseHeader("Last-Modified");
                return G.status == 304 || H == o.lastModified[E]
            } catch(F) {}
            return false
        },
        httpData: function(J, H, G) {
            var F = J.getResponseHeader("content-type"),
            E = H == "xml" || !H && F && F.indexOf("xml") >= 0,
            I = E ? J.responseXML: J.responseText;
            if (E && I.documentElement.tagName == "parsererror") {
                throw "parsererror"
            }
            if (G && G.dataFilter) {
                I = G.dataFilter(I, H)
            }
            if (typeof I === "string") {
                if (H == "script") {
                    o.globalEval(I)
                }
                if (H == "json") {
                    I = l["eval"]("(" + I + ")")
                }
            }
            return I
        },
        param: function(E) {
            var G = [];
            function H(I, J) {
                G[G.length] = encodeURIComponent(I) + "=" + encodeURIComponent(J)
            }
            if (o.isArray(E) || E.jquery) {
                o.each(E,
                function() {
                    H(this.name, this.value)
                })
            } else {
                for (var F in E) {
                    if (o.isArray(E[F])) {
                        o.each(E[F],
                        function() {
                            H(F, this)
                        })
                    } else {
                        H(F, o.isFunction(E[F]) ? E[F]() : E[F])
                    }
                }
            }
            return G.join("&").replace(/%20/g, "+")
        }
    });
    var m = {},
    n, d = [["height", "marginTop", "marginBottom", "paddingTop", "paddingBottom"], ["width", "marginLeft", "marginRight", "paddingLeft", "paddingRight"], ["opacity"]];
    function t(F, E) {
        var G = {};
        o.each(d.concat.apply([], d.slice(0, E)),
        function() {
            G[this] = F
        });
        return G
    }
    o.fn.extend({
        show: function(J, L) {
            if (J) {
                return this.animate(t("show", 3), J, L)
            } else {
                for (var H = 0,
                F = this.length; H < F; H++) {
                    var E = o.data(this[H], "olddisplay");
                    this[H].style.display = E || "";
                    if (o.css(this[H], "display") === "none") {
                        var G = this[H].tagName,
                        K;
                        if (m[G]) {
                            K = m[G]
                        } else {
                            var I = o("<" + G + " />").appendTo("body");
                            K = I.css("display");
                            if (K === "none") {
                                K = "block"
                            }
                            I.remove();
                            m[G] = K
                        }
                        o.data(this[H], "olddisplay", K)
                    }
                }
                for (var H = 0,
                F = this.length; H < F; H++) {
                    this[H].style.display = o.data(this[H], "olddisplay") || ""
                }
                return this
            }
        },
        hide: function(H, I) {
            if (H) {
                return this.animate(t("hide", 3), H, I)
            } else {
                for (var G = 0,
                F = this.length; G < F; G++) {
                    var E = o.data(this[G], "olddisplay");
                    if (!E && E !== "none") {
                        o.data(this[G], "olddisplay", o.css(this[G], "display"))
                    }
                }
                for (var G = 0,
                F = this.length; G < F; G++) {
                    this[G].style.display = "none"
                }
                return this
            }
        },
        _toggle: o.fn.toggle,
        toggle: function(G, F) {
            var E = typeof G === "boolean";
            return o.isFunction(G) && o.isFunction(F) ? this._toggle.apply(this, arguments) : G == null || E ? this.each(function() {
                var H = E ? G: o(this).is(":hidden");
                o(this)[H ? "show": "hide"]()
            }) : this.animate(t("toggle", 3), G, F)
        },
        fadeTo: function(E, G, F) {
            return this.animate({
                opacity: G
            },
            E, F)
        },
        animate: function(I, F, H, G) {
            var E = o.speed(F, H, G);
            return this[E.queue === false ? "each": "queue"](function() {
                var K = o.extend({},
                E),
                M,
                L = this.nodeType == 1 && o(this).is(":hidden"),
                J = this;
                for (M in I) {
                    if (I[M] == "hide" && L || I[M] == "show" && !L) {
                        return K.complete.call(this)
                    }
                    if ((M == "height" || M == "width") && this.style) {
                        K.display = o.css(this, "display");
                        K.overflow = this.style.overflow
                    }
                }
                if (K.overflow != null) {
                    this.style.overflow = "hidden"
                }
                K.curAnim = o.extend({},
                I);
                o.each(I,
                function(O, S) {
                    var R = new o.fx(J, K, O);
                    if (/toggle|show|hide/.test(S)) {
                        R[S == "toggle" ? L ? "show": "hide": S](I)
                    } else {
                        var Q = S.toString().match(/^([+-]=)?([\d+-.]+)(.*)$/),
                        T = R.cur(true) || 0;
                        if (Q) {
                            var N = parseFloat(Q[2]),
                            P = Q[3] || "px";
                            if (P != "px") {
                                J.style[O] = (N || 1) + P;
                                T = ((N || 1) / R.cur(true)) * T;
                                J.style[O] = T + P
                            }
                            if (Q[1]) {
                                N = ((Q[1] == "-=" ? -1 : 1) * N) + T
                            }
                            R.custom(T, N, P)
                        } else {
                            R.custom(T, S, "")
                        }
                    }
                });
                return true
            })
        },
        stop: function(F, E) {
            var G = o.timers;
            if (F) {
                this.queue([])
            }
            this.each(function() {
                for (var H = G.length - 1; H >= 0; H--) {
                    if (G[H].elem == this) {
                        if (E) {
                            G[H](true)
                        }
                        G.splice(H, 1)
                    }
                }
            });
            if (!E) {
                this.dequeue()
            }
            return this
        }
    });
    o.each({
        slideDown: t("show", 1),
        slideUp: t("hide", 1),
        slideToggle: t("toggle", 1),
        fadeIn: {
            opacity: "show"
        },
        fadeOut: {
            opacity: "hide"
        }
    },
    function(E, F) {
        o.fn[E] = function(G, H) {
            return this.animate(F, G, H)
        }
    });
    o.extend({
        speed: function(G, H, F) {
            var E = typeof G === "object" ? G: {
                complete: F || !F && H || o.isFunction(G) && G,
                duration: G,
                easing: F && H || H && !o.isFunction(H) && H
            };
            E.duration = o.fx.off ? 0 : typeof E.duration === "number" ? E.duration: o.fx.speeds[E.duration] || o.fx.speeds._default;
            E.old = E.complete;
            E.complete = function() {
                if (E.queue !== false) {
                    o(this).dequeue()
                }
                if (o.isFunction(E.old)) {
                    E.old.call(this)
                }
            };
            return E
        },
        easing: {
            linear: function(G, H, E, F) {
                return E + F * G
            },
            swing: function(G, H, E, F) {
                return (( - Math.cos(G * Math.PI) / 2) + 0.5) * F + E
            }
        },
        timers: [],
        fx: function(F, E, G) {
            this.options = E;
            this.elem = F;
            this.prop = G;
            if (!E.orig) {
                E.orig = {}
            }
        }
    });
    o.fx.prototype = {
        update: function() {
            if (this.options.step) {
                this.options.step.call(this.elem, this.now, this)
            } (o.fx.step[this.prop] || o.fx.step._default)(this);
            if ((this.prop == "height" || this.prop == "width") && this.elem.style) {
                this.elem.style.display = "block"
            }
        },
        cur: function(F) {
            if (this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null)) {
                return this.elem[this.prop]
            }
            var E = parseFloat(o.css(this.elem, this.prop, F));
            return E && E > -10000 ? E: parseFloat(o.curCSS(this.elem, this.prop)) || 0
        },
        custom: function(I, H, G) {
            this.startTime = e();
            this.start = I;
            this.end = H;
            this.unit = G || this.unit || "px";
            this.now = this.start;
            this.pos = this.state = 0;
            var E = this;
            function F(J) {
                return E.step(J)
            }
            F.elem = this.elem;
            if (F() && o.timers.push(F) && !n) {
                n = setInterval(function() {
                    var K = o.timers;
                    for (var J = 0; J < K.length; J++) {
                        if (!K[J]()) {
                            K.splice(J--, 1)
                        }
                    }
                    if (!K.length) {
                        clearInterval(n);
                        n = g
                    }
                },
                13)
            }
        },
        show: function() {
            this.options.orig[this.prop] = o.attr(this.elem.style, this.prop);
            this.options.show = true;
            this.custom(this.prop == "width" || this.prop == "height" ? 1 : 0, this.cur());
            o(this.elem).show()
        },
        hide: function() {
            this.options.orig[this.prop] = o.attr(this.elem.style, this.prop);
            this.options.hide = true;
            this.custom(this.cur(), 0)
        },
        step: function(H) {
            var G = e();
            if (H || G >= this.options.duration + this.startTime) {
                this.now = this.end;
                this.pos = this.state = 1;
                this.update();
                this.options.curAnim[this.prop] = true;
                var E = true;
                for (var F in this.options.curAnim) {
                    if (this.options.curAnim[F] !== true) {
                        E = false
                    }
                }
                if (E) {
                    if (this.options.display != null) {
                        this.elem.style.overflow = this.options.overflow;
                        this.elem.style.display = this.options.display;
                        if (o.css(this.elem, "display") == "none") {
                            this.elem.style.display = "block"
                        }
                    }
                    if (this.options.hide) {
                        o(this.elem).hide()
                    }
                    if (this.options.hide || this.options.show) {
                        for (var I in this.options.curAnim) {
                            o.attr(this.elem.style, I, this.options.orig[I])
                        }
                    }
                    this.options.complete.call(this.elem)
                }
                return false
            } else {
                var J = G - this.startTime;
                this.state = J / this.options.duration;
                this.pos = o.easing[this.options.easing || (o.easing.swing ? "swing": "linear")](this.state, J, 0, 1, this.options.duration);
                this.now = this.start + ((this.end - this.start) * this.pos);
                this.update()
            }
            return true
        }
    };
    o.extend(o.fx, {
        speeds: {
            slow: 600,
            fast: 200,
            _default: 400
        },
        step: {
            opacity: function(E) {
                o.attr(E.elem.style, "opacity", E.now)
            },
            _default: function(E) {
                if (E.elem.style && E.elem.style[E.prop] != null) {
                    E.elem.style[E.prop] = E.now + E.unit
                } else {
                    E.elem[E.prop] = E.now
                }
            }
        }
    });
    if (document.documentElement.getBoundingClientRect) {
        o.fn.offset = function() {
            if (!this[0]) {
                return {
                    top: 0,
                    left: 0
                }
            }
            if (this[0] === this[0].ownerDocument.body) {
                return o.offset.bodyOffset(this[0])
            }
            var G = this[0].getBoundingClientRect(),
            J = this[0].ownerDocument,
            F = J.body,
            E = J.documentElement,
            L = E.clientTop || F.clientTop || 0,
            K = E.clientLeft || F.clientLeft || 0,
            I = G.top + (self.pageYOffset || o.boxModel && E.scrollTop || F.scrollTop) - L,
            H = G.left + (self.pageXOffset || o.boxModel && E.scrollLeft || F.scrollLeft) - K;
            return {
                top: I,
                left: H
            }
        }
    } else {
        o.fn.offset = function() {
            if (!this[0]) {
                return {
                    top: 0,
                    left: 0
                }
            }
            if (this[0] === this[0].ownerDocument.body) {
                return o.offset.bodyOffset(this[0])
            }
            o.offset.initialized || o.offset.initialize();
            var J = this[0],
            G = J.offsetParent,
            F = J,
            O = J.ownerDocument,
            M,
            H = O.documentElement,
            K = O.body,
            L = O.defaultView,
            E = L.getComputedStyle(J, null),
            N = J.offsetTop,
            I = J.offsetLeft;
            while ((J = J.parentNode) && J !== K && J !== H) {
                M = L.getComputedStyle(J, null);
                N -= J.scrollTop,
                I -= J.scrollLeft;
                if (J === G) {
                    N += J.offsetTop,
                    I += J.offsetLeft;
                    if (o.offset.doesNotAddBorder && !(o.offset.doesAddBorderForTableAndCells && /^t(able|d|h)$/i.test(J.tagName))) {
                        N += parseInt(M.borderTopWidth, 10) || 0,
                        I += parseInt(M.borderLeftWidth, 10) || 0
                    }
                    F = G,
                    G = J.offsetParent
                }
                if (o.offset.subtractsBorderForOverflowNotVisible && M.overflow !== "visible") {
                    N += parseInt(M.borderTopWidth, 10) || 0,
                    I += parseInt(M.borderLeftWidth, 10) || 0
                }
                E = M
            }
            if (E.position === "relative" || E.position === "static") {
                N += K.offsetTop,
                I += K.offsetLeft
            }
            if (E.position === "fixed") {
                N += Math.max(H.scrollTop, K.scrollTop),
                I += Math.max(H.scrollLeft, K.scrollLeft)
            }
            return {
                top: N,
                left: I
            }
        }
    }
    o.offset = {
        initialize: function() {
            if (this.initialized) {
                return
            }
            var L = document.body,
            F = document.createElement("div"),
            H,
            G,
            N,
            I,
            M,
            E,
            J = L.style.marginTop,
            K = '<div style="position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;"><div></div></div><table style="position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;" cellpadding="0" cellspacing="0"><tr><td></td></tr></table>';
            M = {
                position: "absolute",
                top: 0,
                left: 0,
                margin: 0,
                border: 0,
                width: "1px",
                height: "1px",
                visibility: "hidden"
            };
            for (E in M) {
                F.style[E] = M[E]
            }
            F.innerHTML = K;
            L.insertBefore(F, L.firstChild);
            H = F.firstChild,
            G = H.firstChild,
            I = H.nextSibling.firstChild.firstChild;
            this.doesNotAddBorder = (G.offsetTop !== 5);
            this.doesAddBorderForTableAndCells = (I.offsetTop === 5);
            H.style.overflow = "hidden",
            H.style.position = "relative";
            this.subtractsBorderForOverflowNotVisible = (G.offsetTop === -5);
            L.style.marginTop = "1px";
            this.doesNotIncludeMarginInBodyOffset = (L.offsetTop === 0);
            L.style.marginTop = J;
            L.removeChild(F);
            this.initialized = true
        },
        bodyOffset: function(E) {
            o.offset.initialized || o.offset.initialize();
            var G = E.offsetTop,
            F = E.offsetLeft;
            if (o.offset.doesNotIncludeMarginInBodyOffset) {
                G += parseInt(o.curCSS(E, "marginTop", true), 10) || 0,
                F += parseInt(o.curCSS(E, "marginLeft", true), 10) || 0
            }
            return {
                top: G,
                left: F
            }
        }
    };
    o.fn.extend({
        position: function() {
            var I = 0,
            H = 0,
            F;
            if (this[0]) {
                var G = this.offsetParent(),
                J = this.offset(),
                E = /^body|html$/i.test(G[0].tagName) ? {
                    top: 0,
                    left: 0
                }: G.offset();
                J.top -= j(this, "marginTop");
                J.left -= j(this, "marginLeft");
                E.top += j(G, "borderTopWidth");
                E.left += j(G, "borderLeftWidth");
                F = {
                    top: J.top - E.top,
                    left: J.left - E.left
                }
            }
            return F
        },
        offsetParent: function() {
            var E = this[0].offsetParent || document.body;
            while (E && (!/^body|html$/i.test(E.tagName) && o.css(E, "position") == "static")) {
                E = E.offsetParent
            }
            return o(E)
        }
    });
    o.each(["Left", "Top"],
    function(F, E) {
        var G = "scroll" + E;
        o.fn[G] = function(H) {
            if (!this[0]) {
                return null
            }
            return H !== g ? this.each(function() {
                this == l || this == document ? l.scrollTo(!F ? H: o(l).scrollLeft(), F ? H: o(l).scrollTop()) : this[G] = H
            }) : this[0] == l || this[0] == document ? self[F ? "pageYOffset": "pageXOffset"] || o.boxModel && document.documentElement[G] || document.body[G] : this[0][G]
        }
    });
    o.each(["Height", "Width"],
    function(I, G) {
        var E = I ? "Left": "Top",
        H = I ? "Right": "Bottom",
        F = G.toLowerCase();
        o.fn["inner" + G] = function() {
            return this[0] ? o.css(this[0], F, false, "padding") : null
        };
        o.fn["outer" + G] = function(K) {
            return this[0] ? o.css(this[0], F, false, K ? "margin": "border") : null
        };
        var J = G.toLowerCase();
        o.fn[J] = function(K) {
            return this[0] == l ? document.compatMode == "CSS1Compat" && document.documentElement["client" + G] || document.body["client" + G] : this[0] == document ? Math.max(document.documentElement["client" + G], document.body["scroll" + G], document.documentElement["scroll" + G], document.body["offset" + G], document.documentElement["offset" + G]) : K === g ? (this.length ? o.css(this[0], J) : null) : this.css(J, typeof K === "string" ? K: K + "px")
        }
    })
})();;
var Drupal = Drupal || {
    'settings': {},
    'behaviors': {},
    'themes': {},
    'locale': {}
};
Drupal.jsEnabled = document.getElementsByTagName && document.createElement && document.createTextNode && document.documentElement && document.getElementById;
Drupal.attachBehaviors = function(context) {
    context = context || document;
    if (Drupal.jsEnabled) {
        jQuery.each(Drupal.behaviors,
        function() {
            this(context);
        });
    }
};
Drupal.checkPlain = function(str) {
    str = String(str);
    var replace = {
        '&': '&amp;',
        '"': '&quot;',
        '<': '&lt;',
        '>': '&gt;'
    };
    for (var character in replace) {
        var regex = new RegExp(character, 'g');
        str = str.replace(regex, replace[character]);
    }
    return str;
};
Drupal.t = function(str, args) {
    if (Drupal.locale.strings && Drupal.locale.strings[str]) {
        str = Drupal.locale.strings[str];
    }
    if (args) {
        for (var key in args) {
            switch (key.charAt(0)) {
            case '@':
                args[key] = Drupal.checkPlain(args[key]);
                break;
            case '!':
                break;
            case '%':
            default:
                args[key] = Drupal.theme('placeholder', args[key]);
                break;
            }
            str = str.replace(key, args[key]);
        }
    }
    return str;
};
Drupal.formatPlural = function(count, singular, plural, args) {
    var args = args || {};
    args['@count'] = count;
    var index = Drupal.locale.pluralFormula ? Drupal.locale.pluralFormula(args['@count']) : ((args['@count'] == 1) ? 0 : 1);
    if (index == 0) {
        return Drupal.t(singular, args);
    } else if (index == 1) {
        return Drupal.t(plural, args);
    } else {
        args['@count[' + index + ']'] = args['@count'];
        delete args['@count'];
        return Drupal.t(plural.replace('@count', '@count[' + index + ']'));
    }
};
Drupal.theme = function(func) {
    for (var i = 1,
    args = []; i < arguments.length; i++) {
        args.push(arguments[i]);
    }
    return (Drupal.theme[func] || Drupal.theme.prototype[func]).apply(this, args);
};
Drupal.parseJson = function(data) {
    if ((data.substring(0, 1) != '{') && (data.substring(0, 1) != '[')) {
        return {
            status: 0,
            data: data.length ? data: Drupal.t('Unspecified error')
        };
    }
    return eval('(' + data + ');');
};
Drupal.freezeHeight = function() {
    Drupal.unfreezeHeight();
    var div = document.createElement('div');
    $(div).css({
        position: 'absolute',
        top: '0px',
        left: '0px',
        width: '1px',
        height: $('body').css('height')
    }).attr('id', 'freeze-height');
    $('body').append(div);
};
Drupal.unfreezeHeight = function() {
    $('#freeze-height').remove();
};
Drupal.encodeURIComponent = function(item, uri) {
    uri = uri || location.href;
    item = encodeURIComponent(item).replace(/%2F/g, '/');
    return (uri.indexOf('?q=') != -1) ? item: item.replace(/%26/g, '%2526').replace(/%23/g, '%2523').replace(/\/\//g, '/%252F');
};
Drupal.getSelection = function(element) {
    if (typeof(element.selectionStart) != 'number' && document.selection) {
        var range1 = document.selection.createRange();
        var range2 = range1.duplicate();
        range2.moveToElementText(element);
        range2.setEndPoint('EndToEnd', range1);
        var start = range2.text.length - range1.text.length;
        var end = start + range1.text.length;
        return {
            'start': start,
            'end': end
        };
    }
    return {
        'start': element.selectionStart,
        'end': element.selectionEnd
    };
};
Drupal.ahahError = function(xmlhttp, uri) {
    if (xmlhttp.status == 200) {
        if (jQuery.trim($(xmlhttp.responseText).text())) {
            var message = Drupal.t("An error occurred. \n@uri\n@text", {
                '@uri': uri,
                '@text': xmlhttp.responseText
            });
        } else {
            var message = Drupal.t("An error occurred. \n@uri\n(no information available).", {
                '@uri': uri,
                '@text': xmlhttp.responseText
            });
        }
    } else {
        var message = Drupal.t("An HTTP error @status occurred. \n@uri", {
            '@uri': uri,
            '@status': xmlhttp.status
        });
    }
    return message;
}
if (Drupal.jsEnabled) {
    $(document.documentElement).addClass('js');
    document.cookie = 'has_js=1; path=/';
    $(document).ready(function() {
        Drupal.attachBehaviors(this);
    });
}
Drupal.theme.prototype = {
    placeholder: function(str) {
        return '<em>' + Drupal.checkPlain(str) + '</em>';
    }
};; (function($) {
    var buildRating = function($obj) {
        var $widget = buildInterface($obj),
        $stars = $('.star', $widget),
        $cancel = $('.cancel', $widget),
        $summary = $('.fivestar-summary', $obj),
        feedbackTimerId = 0,
        summaryText = $summary.html(),
        summaryHover = $obj.is('.fivestar-labels-hover'),
        currentValue = $("select", $obj).val(),
        cancelTitle = $('label', $obj).html(),
        voteTitle = cancelTitle != Drupal.settings.fivestar.titleAverage ? cancelTitle: Drupal.settings.fivestar.titleUser,
        voteChanged = false;
        if ($obj.is('.fivestar-user-stars')) {
            var starDisplay = 'user';
        } else if ($obj.is('.fivestar-average-stars')) {
            var starDisplay = 'average';
            currentValue = $("input[name=vote_average]", $obj).val();
        } else if ($obj.is('.fivestar-combo-stars')) {
            var starDisplay = 'combo';
        } else {
            var starDisplay = 'none';
        }
        if ($obj.is('.fivestar-smart-stars')) {
            var starDisplay = 'smart';
        }
        if ($summary.size()) {
            var textDisplay = $summary.attr('class').replace(/.*?fivestar-summary-([^ ]+).*/, '$1').replace(/-/g, '_');
        } else {
            var textDisplay = 'none';
        }
        $stars.mouseover(function() {
            event.drain();
            event.fill(this);
        }).mouseout(function() {
            event.drain();
            event.reset();
        });
        $stars.children().focus(function() {
            event.drain();
            event.fill(this.parentNode)
        }).blur(function() {
            event.drain();
            event.reset();
        }).end();
        $cancel.mouseover(function() {
            event.drain();
            $(this).addClass('on')
        }).mouseout(function() {
            event.reset();
            $(this).removeClass('on')
        });
        $cancel.children().focus(function() {
            event.drain();
            $(this.parentNode).addClass('on')
        }).blur(function() {
            event.reset();
            $(this.parentNode).removeClass('on')
        }).end();
        $cancel.click(function() {
            currentValue = 0;
            event.reset();
            voteChanged = false;
            if ($("input.fivestar-path", $obj).size() && $summary.is('.fivestar-feedback-enabled')) {
                setFeedbackText(Drupal.settings.fivestar.feedbackDeletingVote);
            }
            $("select", $obj).val(0);
            cancelTitle = starDisplay != 'smart' ? cancelTitle: Drupal.settings.fivestar.titleAverage;
            $('label', $obj).html(cancelTitle);
            if ($obj.is('.fivestar-smart-text')) {
                $obj.removeClass('fivestar-user-text').addClass('fivestar-average-text');
                $summary[0].className = $summary[0].className.replace(/-user/, '-average');
                textDisplay = $summary.attr('class').replace(/.*?fivestar-summary-([^ ]+).*/, '$1').replace(/-/g, '_');
            }
            if ($obj.is('.fivestar-smart-stars')) {
                $obj.removeClass('fivestar-user-stars').addClass('fivestar-average-stars');
            }
            $("input.fivestar-path", $obj).each(function() {
                var token = $("input.fivestar-token", $obj).val();
                $.ajax({
                    type: 'GET',
                    data: {
                        token: token
                    },
                    dataType: 'xml',
                    url: this.value + '/' + 0,
                    success: voteHook
                });
            });
            return false;
        });
        $stars.click(function() {
            currentValue = $('select option', $obj).get($stars.index(this) + $cancel.size() + 1).value;
            $("select", $obj).val(currentValue);
            voteChanged = true;
            event.reset();
            if ($("input.fivestar-path", $obj).size() && $summary.is('.fivestar-feedback-enabled')) {
                setFeedbackText(Drupal.settings.fivestar.feedbackSavingVote);
            }
            if ($obj.is('.fivestar-smart-text')) {
                $obj.removeClass('fivestar-average-text').addClass('fivestar-user-text');
                $summary[0].className = $summary[0].className.replace(/-average/, '-user');
                textDisplay = $summary.attr('class').replace(/.*?fivestar-summary-([^ ]+).*/, '$1').replace(/-/g, '_');
            }
            if ($obj.is('.fivestar-smart-stars')) {
                $obj.removeClass('fivestar-average-stars').addClass('fivestar-user-stars');
            }
            $("input.fivestar-path", $obj).each(function() {
                var token = $("input.fivestar-token", $obj).val();
                $.ajax({
                    type: 'GET',
                    data: {
                        token: token
                    },
                    dataType: 'xml',
                    url: this.value + '/' + currentValue,
                    success: voteHook
                });
            });
            return false;
        });
        var event = {
            fill: function(el) {
                var index = $stars.index(el) + 1;
                $stars.children('a').css('width', '100%').end().filter(':lt(' + index + ')').addClass('hover').end();
                if (summaryHover && !feedbackTimerId) {
                    var summary = $("select option", $obj)[index + $cancel.size()].text;
                    var value = $("select option", $obj)[index + $cancel.size()].value;
                    $summary.html(summary != index + 1 ? summary: '&nbsp;');
                    $('label', $obj).html(voteTitle);
                }
            },
            drain: function() {
                $stars.filter('.on').removeClass('on').end().filter('.hover').removeClass('hover').end();
                if (summaryHover && !feedbackTimerId) {
                    var cancelText = $("select option", $obj)[1].text;
                    $summary.html(($cancel.size() && cancelText != 0) ? cancelText: '&nbsp');
                    if (!voteChanged) {
                        $('label', $obj).html(cancelTitle);
                    }
                }
            },
            reset: function() {
                var starValue = currentValue / 100 * $stars.size();
                var percent = (starValue - Math.floor(starValue)) * 100;
                $stars.filter(':lt(' + Math.floor(starValue) + ')').addClass('on').end();
                if (percent > 0) {
                    $stars.eq(Math.floor(starValue)).addClass('on').children('a').css('width', percent + "%").end().end();
                }
                if (summaryHover && !feedbackTimerId) {
                    $summary.html(summaryText ? summaryText: '&nbsp;');
                }
                if (voteChanged) {
                    $('label', $obj).html(voteTitle);
                } else {
                    $('label', $obj).html(cancelTitle);
                }
            }
        };
        var setFeedbackText = function(text) {
            feedbackTimerId = 1;
            $summary.html(text);
        };
        var voteHook = function(data) {
            var returnObj = {
                result: {
                    count: $("result > count", data).text(),
                    average: $("result > average", data).text(),
                    summary: {
                        average: $("summary average", data).text(),
                        average_count: $("summary average_count", data).text(),
                        user: $("summary user", data).text(),
                        user_count: $("summary user_count", data).text(),
                        combo: $("summary combo", data).text(),
                        count: $("summary count", data).text()
                    }
                },
                vote: {
                    id: $("vote id", data).text(),
                    tag: $("vote tag", data).text(),
                    type: $("vote type", data).text(),
                    value: $("vote value", data).text()
                },
                display: {
                    stars: starDisplay,
                    text: textDisplay
                }
            };
            if (window.fivestarResult) {
                fivestarResult(returnObj);
            } else {
                fivestarDefaultResult(returnObj);
            }
            summaryText = returnObj.result.summary[returnObj.display.text];
            if ($(returnObj.result.summary.average).is('.fivestar-feedback-enabled')) {
                if (returnObj.vote.value != 0) {
                    setFeedbackText(Drupal.settings.fivestar.feedbackVoteSaved);
                } else {
                    setFeedbackText(Drupal.settings.fivestar.feedbackVoteDeleted);
                }
                feedbackTimerId = setTimeout(function() {
                    clearTimeout(feedbackTimerId);
                    feedbackTimerId = 0;
                    $summary.html(returnObj.result.summary[returnObj.display.text]);
                },
                2000);
            }
            if (returnObj.vote.value == 0 && (starDisplay == 'average' || starDisplay == 'smart')) {
                currentValue = returnObj.result.average;
                event.reset();
            }
        };
        event.reset();
        return $widget;
    };
    var buildInterface = function($widget) {
        var $container = $('<div class="fivestar-widget clear-block"></div>');
        var $options = $("select option", $widget);
        var size = $('option', $widget).size() - 1;
        var cancel = 1;
        for (var i = 1,
        option; option = $options[i]; i++) {
            if (option.value == "0") {
                cancel = 0;
                $div = $('<div class="cancel"><a href="#0" title="' + option.text + '">' + option.text + '</a></div>');
            } else {
                var zebra = (i + cancel - 1) % 2 == 0 ? 'even': 'odd';
                var count = i + cancel - 1;
                var first = count == 1 ? ' star-first': '';
                var last = count == size + cancel - 1 ? ' star-last': '';
                $div = $('<div class="star star-' + count + ' star-' + zebra + first + last + '"><a href="#' + option.value + '" title="' + option.text + '">' + option.text + '</a></div>');
            }
            $container.append($div[0]);
        }
        $container.addClass('fivestar-widget-' + (size + cancel - 1));
        $('select', $widget).after($container).css('display', 'none');
        return $container;
    };
    function fivestarDefaultResult(voteResult) {
        $('div.fivestar-summary-' + voteResult.vote.tag + '-' + voteResult.vote.id).html(voteResult.result.summary[voteResult.display.text]);
        if (voteResult.display.stars == 'combo') {
            $('div.fivestar-form-' + voteResult.vote.id).each(function() {
                var $stars = $('.fivestar-widget-static .star span', this);
                var average = voteResult.result.average / 100 * $stars.size();
                var index = Math.floor(average);
                $stars.removeClass('on').addClass('off').css('width', 'auto');
                $stars.filter(':lt(' + (index + 1) + ')').removeClass('off').addClass('on');
                $stars.eq(index).css('width', ((average - index) * 100) + "%");
                var $summary = $('.fivestar-static-form-item .fivestar-summary', this);
                if ($summary.size()) {
                    var textDisplay = $summary.attr('class').replace(/.*?fivestar-summary-([^ ]+).*/, '$1').replace(/-/g, '_');
                    $summary.html(voteResult.result.summary[textDisplay]);
                }
            });
        }
    };
    $.fn.fivestar = function() {
        var stack = [];
        this.each(function() {
            var ret = buildRating($(this));
            stack.push(ret);
        });
        return stack;
    };
    if ($.browser.msie == true) {
        try {
            document.execCommand('BackgroundImageCache', false, true);
        } catch(err) {}
    }
    Drupal.behaviors.fivestar = function(context) {
        $('div.fivestar-form-item:not(.fivestar-processed)', context).addClass('fivestar-processed').fivestar();
        $('input.fivestar-submit', context).css('display', 'none');
    }
})(jQuery);; (function($) {
    Drupal.Panels = {};
    Drupal.Panels.autoAttach = function() {
        if ($.browser.msie) {
            $("div.panel-pane").hover(function() {
                $('div.panel-hide', this).addClass("panel-hide-hover");
                return true;
            },
            function() {
                $('div.panel-hide', this).removeClass("panel-hide-hover");
                return true;
            });
            $("div.admin-links").hover(function() {
                $(this).addClass("admin-links-hover");
                return true;
            },
            function() {
                $(this).removeClass("admin-links-hover");
                return true;
            });
        }
    };
    $(Drupal.Panels.autoAttach);
})(jQuery);;
Drupal.tableHeaderDoScroll = function() {
    if (typeof(Drupal.tableHeaderOnScroll) == 'function') {
        Drupal.tableHeaderOnScroll();
    }
};
Drupal.behaviors.tableHeader = function(context) {
    if (jQuery.browser.msie && parseInt(jQuery.browser.version, 10) < 7) {
        return;
    }
    var headers = [];
    $('table.sticky-enabled thead:not(.tableHeader-processed)', context).each(function() {
        var headerClone = $(this).clone(true).insertBefore(this.parentNode).wrap('<table class="sticky-header"></table>').parent().css({
            position: 'fixed',
            top: '0px'
        });
        headerClone = $(headerClone)[0];
        headers.push(headerClone);
        var table = $(this).parent('table')[0];
        headerClone.table = table;
        tracker(headerClone);
        $(table).addClass('sticky-table');
        $(this).addClass('tableHeader-processed');
    });
    var prevAnchor = '';
    function tracker(e) {
        var viewHeight = document.documentElement.scrollHeight || document.body.scrollHeight;
        if (e.viewHeight != viewHeight) {
            e.viewHeight = viewHeight;
            e.vPosition = $(e.table).offset().top - 4;
            e.hPosition = $(e.table).offset().left;
            e.vLength = e.table.clientHeight - 100;
            var parentCell = $('th', e.table);
            $('th', e).each(function(index) {
                var cellWidth = parentCell.eq(index).css('width');
                if (cellWidth == 'auto') {
                    cellWidth = parentCell.get(index).clientWidth + 'px';
                }
                $(this).css('width', cellWidth);
            });
            $(e).css('width', $(e.table).css('width'));
        }
        var hScroll = document.documentElement.scrollLeft || document.body.scrollLeft;
        var vOffset = (document.documentElement.scrollTop || document.body.scrollTop) - e.vPosition;
        var visState = (vOffset > 0 && vOffset < e.vLength) ? 'visible': 'hidden';
        $(e).css({
            left: -hScroll + e.hPosition + 'px',
            visibility: visState
        });
        if (prevAnchor != location.hash) {
            if (location.hash != '') {
                var offset = $('td' + location.hash).offset();
                if (offset) {
                    var top = offset.top;
                    var scrollLocation = top - $(e).height();
                    $('body, html').scrollTop(scrollLocation);
                }
            }
            prevAnchor = location.hash;
        }
    }
    if (!$('body').hasClass('tableHeader-processed')) {
        $('body').addClass('tableHeader-processed');
        $(window).scroll(Drupal.tableHeaderDoScroll);
        $(document.documentElement).scroll(Drupal.tableHeaderDoScroll);
    }
    Drupal.tableHeaderOnScroll = function() {
        $(headers).each(function() {
            tracker(this);
        });
    };
    var time = null;
    var resize = function() {
        if (time) {
            return;
        }
        time = setTimeout(function() {
            $('table.sticky-header').each(function() {
                this.viewHeight = 0;
                tracker(this);
            });
            time = null;
        },
        250);
    };
    $(window).resize(resize);
};; (function($) {
    $.fn.hoverIntent = function(f, g) {
        var cfg = {
            sensitivity: 7,
            interval: 100,
            timeout: 0
        };
        cfg = $.extend(cfg, g ? {
            over: f,
            out: g
        }: f);
        var cX, cY, pX, pY;
        var track = function(ev) {
            cX = ev.pageX;
            cY = ev.pageY;
        };
        var compare = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            if ((Math.abs(pX - cX) + Math.abs(pY - cY)) < cfg.sensitivity) {
                $(ob).unbind("mousemove", track);
                ob.hoverIntent_s = 1;
                return cfg.over.apply(ob, [ev]);
            } else {
                pX = cX;
                pY = cY;
                ob.hoverIntent_t = setTimeout(function() {
                    compare(ev, ob);
                },
                cfg.interval);
            }
        };
        var delay = function(ev, ob) {
            ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            ob.hoverIntent_s = 0;
            return cfg.out.apply(ob, [ev]);
        };
        var handleHover = function(e) {
            var p = (e.type == "mouseover" ? e.fromElement: e.toElement) || e.relatedTarget;
            while (p && p != this) {
                try {
                    p = p.parentNode;
                } catch(e) {
                    p = this;
                }
            }
            if (p == this) {
                return false;
            }
            var ev = jQuery.extend({},
            e);
            var ob = this;
            if (ob.hoverIntent_t) {
                ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
            }
            if (e.type == "mouseover") {
                pX = ev.pageX;
                pY = ev.pageY;
                $(ob).bind("mousemove", track);
                if (ob.hoverIntent_s != 1) {
                    ob.hoverIntent_t = setTimeout(function() {
                        compare(ev, ob);
                    },
                    cfg.interval);
                }
            } else {
                $(ob).unbind("mousemove", track);
                if (ob.hoverIntent_s == 1) {
                    ob.hoverIntent_t = setTimeout(function() {
                        delay(ev, ob);
                    },
                    cfg.timeout);
                }
            }
        };
        return this.mouseover(handleHover).mouseout(handleHover);
    };
})(jQuery);;; (function($) {
    $.fn.superfish = function(op) {
        var sf = $.fn.superfish,
        c = sf.c,
        $arrow = $([''].join('')),
        over = function() {
            var $$ = $(this),
            menu = getMenu($$);
            clearTimeout(menu.sfTimer);
            $$.showSuperfishUl().siblings().hideSuperfishUl();
        },
        out = function() {
            var $$ = $(this),
            menu = getMenu($$),
            o = sf.op;
            clearTimeout(menu.sfTimer);
            menu.sfTimer = setTimeout(function() {
                o.retainPath = ($.inArray($$[0], o.$path) > -1);
                $$.hideSuperfishUl();
                if (o.$path.length && $$.parents(['li.', o.hoverClass].join('')).length < 1) {
                    over.call(o.$path);
                }
            },
            o.delay);
        },
        getMenu = function($menu) {
            var menu = $menu.parents(['ul.', c.menuClass, ':first'].join(''))[0];
            sf.op = sf.o[menu.serial];
            return menu;
        },
        addArrow = function($a) {
            $a.addClass(c.anchorClass).append($arrow.clone());
        };
        return this.each(function() {
            var s = this.serial = sf.o.length;
            var o = $.extend({},
            sf.defaults, op);
            o.$path = $('li.' + o.pathClass, this).slice(0, o.pathLevels).each(function() {
                $(this).addClass([o.hoverClass, c.bcClass].join(' ')).filter('li:has(ul)').removeClass(o.pathClass);
            });
            sf.o[s] = sf.op = o;
            $('li:has(ul)', this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent': 'hover'](over, out).each(function() {
                if (o.autoArrows) addArrow($('>a:first-child', this));
            }).not('.' + c.bcClass).hideSuperfishUl();
            var $a = $('a', this);
            $a.each(function(i) {
                var $li = $a.eq(i).parents('li');
                $a.eq(i).focus(function() {
                    over.call($li);
                }).blur(function() {
                    out.call($li);
                });
            });
            o.onInit.call(this);
        }).each(function() {
            menuClasses = [c.menuClass];
            if (sf.op.dropShadows && !($.browser.msie && $.browser.version < 7)) menuClasses.push(c.shadowClass);
            $(this).addClass(menuClasses.join(' '));
        });
    };
    var sf = $.fn.superfish;
    sf.o = [];
    sf.op = {};
    sf.IE7fix = function() {
        var o = sf.op;
        if ($.browser.msie && $.browser.version > 6 && o.dropShadows && o.animation.opacity != undefined) this.toggleClass(sf.c.shadowClass + '-off');
    };
    sf.c = {
        bcClass: 'sf-breadcrumb',
        menuClass: 'sf-js-enabled',
        anchorClass: 'sf-with-ul',
        arrowClass: 'sf-sub-indicator',
        shadowClass: 'sf-shadow'
    };
    sf.defaults = {
        hoverClass: 'sfHover',
        pathClass: 'overideThisToUse',
        pathLevels: 1,
        delay: 800,
        animation: {
            opacity: 'show'
        },
        speed: 'normal',
        autoArrows: true,
        dropShadows: true,
        disableHI: false,
        onInit: function() {},
        onBeforeShow: function() {},
        onShow: function() {},
        onHide: function() {}
    };
    $.fn.extend({
        hideSuperfishUl: function() {
            var o = sf.op,
            not = (o.retainPath === true) ? o.$path: '';
            o.retainPath = false;
            var $ul = $(['li.', o.hoverClass].join(''), this).add(this).not(not).removeClass(o.hoverClass).find('>ul').hide().css('visibility', 'hidden');
            o.onHide.call($ul);
            return this;
        },
        showSuperfishUl: function() {
            var o = sf.op,
            sh = sf.c.shadowClass + '-off',
            $ul = this.addClass(o.hoverClass).find('>ul:hidden').css('visibility', 'visible');
            sf.IE7fix.call($ul);
            o.onBeforeShow.call($ul);
            $ul.animate(o.animation, o.speed,
            function() {
                sf.IE7fix.call($ul);
                o.onShow.call($ul);
            });
            return this;
        }
    });
})(jQuery);;
Drupal.behaviors.skyBehavior = function(context) {
    jQuery('#navigation ul').superfish({
        animation: {
            opacity: 'show',
            height: 'show'
        },
        easing: 'swing',
        speed: 250,
        autoArrows: false,
        dropShadows: false
    });
    jQuery(".copy-comment").click(function() {
        prompt('Link to this comment:', this.href);
    });
};;
jQuery.ui || (function(c) {
    var i = c.fn.remove,
    d = c.browser.mozilla && (parseFloat(c.browser.version) < 1.9);
    c.ui = {
        version: "1.7.3",
        plugin: {
            add: function(k, l, n) {
                var m = c.ui[k].prototype;
                for (var j in n) {
                    m.plugins[j] = m.plugins[j] || [];
                    m.plugins[j].push([l, n[j]])
                }
            },
            call: function(j, l, k) {
                var n = j.plugins[l];
                if (!n || !j.element[0].parentNode) {
                    return
                }
                for (var m = 0; m < n.length; m++) {
                    if (j.options[n[m][0]]) {
                        n[m][1].apply(j.element, k)
                    }
                }
            }
        },
        contains: function(k, j) {
            return document.compareDocumentPosition ? k.compareDocumentPosition(j) & 16 : k !== j && k.contains(j)
        },
        hasScroll: function(m, k) {
            if (c(m).css("overflow") == "hidden") {
                return false
            }
            var j = (k && k == "left") ? "scrollLeft": "scrollTop",
            l = false;
            if (m[j] > 0) {
                return true
            }
            m[j] = 1;
            l = (m[j] > 0);
            m[j] = 0;
            return l
        },
        isOverAxis: function(k, j, l) {
            return (k > j) && (k < (j + l))
        },
        isOver: function(o, k, n, m, j, l) {
            return c.ui.isOverAxis(o, n, j) && c.ui.isOverAxis(k, m, l)
        },
        keyCode: {
            BACKSPACE: 8,
            CAPS_LOCK: 20,
            COMMA: 188,
            CONTROL: 17,
            DELETE: 46,
            DOWN: 40,
            END: 35,
            ENTER: 13,
            ESCAPE: 27,
            HOME: 36,
            INSERT: 45,
            LEFT: 37,
            NUMPAD_ADD: 107,
            NUMPAD_DECIMAL: 110,
            NUMPAD_DIVIDE: 111,
            NUMPAD_ENTER: 108,
            NUMPAD_MULTIPLY: 106,
            NUMPAD_SUBTRACT: 109,
            PAGE_DOWN: 34,
            PAGE_UP: 33,
            PERIOD: 190,
            RIGHT: 39,
            SHIFT: 16,
            SPACE: 32,
            TAB: 9,
            UP: 38
        }
    };
    if (d) {
        var f = c.attr,
        e = c.fn.removeAttr,
        h = "http://www.w3.org/2005/07/aaa",
        a = /^aria-/,
        b = /^wairole:/;
        c.attr = function(k, j, l) {
            var m = l !== undefined;
            return (j == "role" ? (m ? f.call(this, k, j, "wairole:" + l) : (f.apply(this, arguments) || "").replace(b, "")) : (a.test(j) ? (m ? k.setAttributeNS(h, j.replace(a, "aaa:"), l) : f.call(this, k, j.replace(a, "aaa:"))) : f.apply(this, arguments)))
        };
        c.fn.removeAttr = function(j) {
            return (a.test(j) ? this.each(function() {
                this.removeAttributeNS(h, j.replace(a, ""))
            }) : e.call(this, j))
        }
    }
    c.fn.extend({
        remove: function(j, k) {
            return this.each(function() {
                if (!k) {
                    if (!j || c.filter(j, [this]).length) {
                        c("*", this).add(this).each(function() {
                            c(this).triggerHandler("remove")
                        })
                    }
                }
                return i.call(c(this), j, k)
            })
        },
        enableSelection: function() {
            return this.attr("unselectable", "off").css("MozUserSelect", "").unbind("selectstart.ui")
        },
        disableSelection: function() {
            return this.attr("unselectable", "on").css("MozUserSelect", "none").bind("selectstart.ui",
            function() {
                return false
            })
        },
        scrollParent: function() {
            var j;
            if ((c.browser.msie && (/(static|relative)/).test(this.css("position"))) || (/absolute/).test(this.css("position"))) {
                j = this.parents().filter(function() {
                    return (/(relative|absolute|fixed)/).test(c.curCSS(this, "position", 1)) && (/(auto|scroll)/).test(c.curCSS(this, "overflow", 1) + c.curCSS(this, "overflow-y", 1) + c.curCSS(this, "overflow-x", 1))
                }).eq(0)
            } else {
                j = this.parents().filter(function() {
                    return (/(auto|scroll)/).test(c.curCSS(this, "overflow", 1) + c.curCSS(this, "overflow-y", 1) + c.curCSS(this, "overflow-x", 1))
                }).eq(0)
            }
            return (/fixed/).test(this.css("position")) || !j.length ? c(document) : j
        }
    });
    c.extend(c.expr[":"], {
        data: function(l, k, j) {
            return !! c.data(l, j[3])
        },
        focusable: function(k) {
            var l = k.nodeName.toLowerCase(),
            j = c.attr(k, "tabindex");
            return (/input|select|textarea|button|object/.test(l) ? !k.disabled: "a" == l || "area" == l ? k.href || !isNaN(j) : !isNaN(j)) && !c(k)["area" == l ? "parents": "closest"](":hidden").length
        },
        tabbable: function(k) {
            var j = c.attr(k, "tabindex");
            return (isNaN(j) || j >= 0) && c(k).is(":focusable")
        }
    });
    function g(m, n, o, l) {
        function k(q) {
            var p = c[m][n][q] || [];
            return (typeof p == "string" ? p.split(/,?\s+/) : p)
        }
        var j = k("getter");
        if (l.length == 1 && typeof l[0] == "string") {
            j = j.concat(k("getterSetter"))
        }
        return (c.inArray(o, j) != -1)
    }
    c.widget = function(k, j) {
        var l = k.split(".")[0];
        k = k.split(".")[1];
        c.fn[k] = function(p) {
            var n = (typeof p == "string"),
            o = Array.prototype.slice.call(arguments, 1);
            if (n && p.substring(0, 1) == "_") {
                return this
            }
            if (n && g(l, k, p, o)) {
                var m = c.data(this[0], k);
                return (m ? m[p].apply(m, o) : undefined)
            }
            return this.each(function() {
                var q = c.data(this, k); (!q && !n && c.data(this, k, new c[l][k](this, p))._init()); (q && n && c.isFunction(q[p]) && q[p].apply(q, o))
            })
        };
        c[l] = c[l] || {};
        c[l][k] = function(o, n) {
            var m = this;
            this.namespace = l;
            this.widgetName = k;
            this.widgetEventPrefix = c[l][k].eventPrefix || k;
            this.widgetBaseClass = l + "-" + k;
            this.options = c.extend({},
            c.widget.defaults, c[l][k].defaults, c.metadata && c.metadata.get(o)[k], n);
            this.element = c(o).bind("setData." + k,
            function(q, p, r) {
                if (q.target == o) {
                    return m._setData(p, r)
                }
            }).bind("getData." + k,
            function(q, p) {
                if (q.target == o) {
                    return m._getData(p)
                }
            }).bind("remove",
            function() {
                return m.destroy()
            })
        };
        c[l][k].prototype = c.extend({},
        c.widget.prototype, j);
        c[l][k].getterSetter = "option"
    };
    c.widget.prototype = {
        _init: function() {},
        destroy: function() {
            this.element.removeData(this.widgetName).removeClass(this.widgetBaseClass + "-disabled " + this.namespace + "-state-disabled").removeAttr("aria-disabled")
        },
        option: function(l, m) {
            var k = l,
            j = this;
            if (typeof l == "string") {
                if (m === undefined) {
                    return this._getData(l)
                }
                k = {};
                k[l] = m
            }
            c.each(k,
            function(n, o) {
                j._setData(n, o)
            })
        },
        _getData: function(j) {
            return this.options[j]
        },
        _setData: function(j, k) {
            this.options[j] = k;
            if (j == "disabled") {
                this.element[k ? "addClass": "removeClass"](this.widgetBaseClass + "-disabled " + this.namespace + "-state-disabled").attr("aria-disabled", k)
            }
        },
        enable: function() {
            this._setData("disabled", false)
        },
        disable: function() {
            this._setData("disabled", true)
        },
        _trigger: function(l, m, n) {
            var p = this.options[l],
            j = (l == this.widgetEventPrefix ? l: this.widgetEventPrefix + l);
            m = c.Event(m);
            m.type = j;
            if (m.originalEvent) {
                for (var k = c.event.props.length,
                o; k;) {
                    o = c.event.props[--k];
                    m[o] = m.originalEvent[o]
                }
            }
            this.element.trigger(m, n);
            return ! (c.isFunction(p) && p.call(this.element[0], m, n) === false || m.isDefaultPrevented())
        }
    };
    c.widget.defaults = {
        disabled: false
    };
    c.ui.mouse = {
        _mouseInit: function() {
            var j = this;
            this.element.bind("mousedown." + this.widgetName,
            function(k) {
                return j._mouseDown(k)
            }).bind("click." + this.widgetName,
            function(k) {
                if (j._preventClickEvent) {
                    j._preventClickEvent = false;
                    k.stopImmediatePropagation();
                    return false
                }
            });
            if (c.browser.msie) {
                this._mouseUnselectable = this.element.attr("unselectable");
                this.element.attr("unselectable", "on")
            }
            this.started = false
        },
        _mouseDestroy: function() {
            this.element.unbind("." + this.widgetName); (c.browser.msie && this.element.attr("unselectable", this._mouseUnselectable))
        },
        _mouseDown: function(l) {
            l.originalEvent = l.originalEvent || {};
            if (l.originalEvent.mouseHandled) {
                return
            } (this._mouseStarted && this._mouseUp(l));
            this._mouseDownEvent = l;
            var k = this,
            m = (l.which == 1),
            j = (typeof this.options.cancel == "string" ? c(l.target).parents().add(l.target).filter(this.options.cancel).length: false);
            if (!m || j || !this._mouseCapture(l)) {
                return true
            }
            this.mouseDelayMet = !this.options.delay;
            if (!this.mouseDelayMet) {
                this._mouseDelayTimer = setTimeout(function() {
                    k.mouseDelayMet = true
                },
                this.options.delay)
            }
            if (this._mouseDistanceMet(l) && this._mouseDelayMet(l)) {
                this._mouseStarted = (this._mouseStart(l) !== false);
                if (!this._mouseStarted) {
                    l.preventDefault();
                    return true
                }
            }
            this._mouseMoveDelegate = function(n) {
                return k._mouseMove(n)
            };
            this._mouseUpDelegate = function(n) {
                return k._mouseUp(n)
            };
            c(document).bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate); (c.browser.safari || l.preventDefault());
            l.originalEvent.mouseHandled = true;
            return true
        },
        _mouseMove: function(j) {
            if (c.browser.msie && !j.button) {
                return this._mouseUp(j)
            }
            if (this._mouseStarted) {
                this._mouseDrag(j);
                return j.preventDefault()
            }
            if (this._mouseDistanceMet(j) && this._mouseDelayMet(j)) {
                this._mouseStarted = (this._mouseStart(this._mouseDownEvent, j) !== false); (this._mouseStarted ? this._mouseDrag(j) : this._mouseUp(j))
            }
            return ! this._mouseStarted
        },
        _mouseUp: function(j) {
            c(document).unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate);
            if (this._mouseStarted) {
                this._mouseStarted = false;
                this._preventClickEvent = (j.target == this._mouseDownEvent.target);
                this._mouseStop(j)
            }
            return false
        },
        _mouseDistanceMet: function(j) {
            return (Math.max(Math.abs(this._mouseDownEvent.pageX - j.pageX), Math.abs(this._mouseDownEvent.pageY - j.pageY)) >= this.options.distance)
        },
        _mouseDelayMet: function(j) {
            return this.mouseDelayMet
        },
        _mouseStart: function(j) {},
        _mouseDrag: function(j) {},
        _mouseStop: function(j) {},
        _mouseCapture: function(j) {
            return true
        }
    };
    c.ui.mouse.defaults = {
        cancel: null,
        distance: 1,
        delay: 0
    }
})(jQuery);; (function(a) {
    a.widget("ui.slider", a.extend({},
    a.ui.mouse, {
        _init: function() {
            var b = this,
            c = this.options;
            this._keySliding = false;
            this._handleIndex = null;
            this._detectOrientation();
            this._mouseInit();
            this.element.addClass("ui-slider ui-slider-" + this.orientation + " ui-widget ui-widget-content ui-corner-all");
            this.range = a([]);
            if (c.range) {
                if (c.range === true) {
                    this.range = a("<div></div>");
                    if (!c.values) {
                        c.values = [this._valueMin(), this._valueMin()]
                    }
                    if (c.values.length && c.values.length != 2) {
                        c.values = [c.values[0], c.values[0]]
                    }
                } else {
                    this.range = a("<div></div>")
                }
                this.range.appendTo(this.element).addClass("ui-slider-range");
                if (c.range == "min" || c.range == "max") {
                    this.range.addClass("ui-slider-range-" + c.range)
                }
                this.range.addClass("ui-widget-header")
            }
            if (a(".ui-slider-handle", this.element).length == 0) {
                a('<a href="#"></a>').appendTo(this.element).addClass("ui-slider-handle")
            }
            if (c.values && c.values.length) {
                while (a(".ui-slider-handle", this.element).length < c.values.length) {
                    a('<a href="#"></a>').appendTo(this.element).addClass("ui-slider-handle")
                }
            }
            this.handles = a(".ui-slider-handle", this.element).addClass("ui-state-default ui-corner-all");
            this.handle = this.handles.eq(0);
            this.handles.add(this.range).filter("a").click(function(d) {
                d.preventDefault()
            }).hover(function() {
                if (!c.disabled) {
                    a(this).addClass("ui-state-hover")
                }
            },
            function() {
                a(this).removeClass("ui-state-hover")
            }).focus(function() {
                if (!c.disabled) {
                    a(".ui-slider .ui-state-focus").removeClass("ui-state-focus");
                    a(this).addClass("ui-state-focus")
                } else {
                    a(this).blur()
                }
            }).blur(function() {
                a(this).removeClass("ui-state-focus")
            });
            this.handles.each(function(d) {
                a(this).data("index.ui-slider-handle", d)
            });
            this.handles.keydown(function(i) {
                var f = true;
                var e = a(this).data("index.ui-slider-handle");
                if (b.options.disabled) {
                    return
                }
                switch (i.keyCode) {
                case a.ui.keyCode.HOME:
                case a.ui.keyCode.END:
                case a.ui.keyCode.UP:
                case a.ui.keyCode.RIGHT:
                case a.ui.keyCode.DOWN:
                case a.ui.keyCode.LEFT:
                    f = false;
                    if (!b._keySliding) {
                        b._keySliding = true;
                        a(this).addClass("ui-state-active");
                        b._start(i, e)
                    }
                    break
                }
                var g, d, h = b._step();
                if (b.options.values && b.options.values.length) {
                    g = d = b.values(e)
                } else {
                    g = d = b.value()
                }
                switch (i.keyCode) {
                case a.ui.keyCode.HOME:
                    d = b._valueMin();
                    break;
                case a.ui.keyCode.END:
                    d = b._valueMax();
                    break;
                case a.ui.keyCode.UP:
                case a.ui.keyCode.RIGHT:
                    if (g == b._valueMax()) {
                        return
                    }
                    d = g + h;
                    break;
                case a.ui.keyCode.DOWN:
                case a.ui.keyCode.LEFT:
                    if (g == b._valueMin()) {
                        return
                    }
                    d = g - h;
                    break
                }
                b._slide(i, e, d);
                return f
            }).keyup(function(e) {
                var d = a(this).data("index.ui-slider-handle");
                if (b._keySliding) {
                    b._stop(e, d);
                    b._change(e, d);
                    b._keySliding = false;
                    a(this).removeClass("ui-state-active")
                }
            });
            this._refreshValue()
        },
        destroy: function() {
            this.handles.remove();
            this.range.remove();
            this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-slider-disabled ui-widget ui-widget-content ui-corner-all").removeData("slider").unbind(".slider");
            this._mouseDestroy()
        },
        _mouseCapture: function(d) {
            var e = this.options;
            if (e.disabled) {
                return false
            }
            this.elementSize = {
                width: this.element.outerWidth(),
                height: this.element.outerHeight()
            };
            this.elementOffset = this.element.offset();
            var h = {
                x: d.pageX,
                y: d.pageY
            };
            var j = this._normValueFromMouse(h);
            var c = this._valueMax() - this._valueMin() + 1,
            f;
            var k = this,
            i;
            this.handles.each(function(l) {
                var m = Math.abs(j - k.values(l));
                if (c > m) {
                    c = m;
                    f = a(this);
                    i = l
                }
            });
            if (e.range == true && this.values(1) == e.min) {
                f = a(this.handles[++i])
            }
            this._start(d, i);
            k._handleIndex = i;
            f.addClass("ui-state-active").focus();
            var g = f.offset();
            var b = !a(d.target).parents().andSelf().is(".ui-slider-handle");
            this._clickOffset = b ? {
                left: 0,
                top: 0
            }: {
                left: d.pageX - g.left - (f.width() / 2),
                top: d.pageY - g.top - (f.height() / 2) - (parseInt(f.css("borderTopWidth"), 10) || 0) - (parseInt(f.css("borderBottomWidth"), 10) || 0) + (parseInt(f.css("marginTop"), 10) || 0)
            };
            j = this._normValueFromMouse(h);
            this._slide(d, i, j);
            return true
        },
        _mouseStart: function(b) {
            return true
        },
        _mouseDrag: function(d) {
            var b = {
                x: d.pageX,
                y: d.pageY
            };
            var c = this._normValueFromMouse(b);
            this._slide(d, this._handleIndex, c);
            return false
        },
        _mouseStop: function(b) {
            this.handles.removeClass("ui-state-active");
            this._stop(b, this._handleIndex);
            this._change(b, this._handleIndex);
            this._handleIndex = null;
            this._clickOffset = null;
            return false
        },
        _detectOrientation: function() {
            this.orientation = this.options.orientation == "vertical" ? "vertical": "horizontal"
        },
        _normValueFromMouse: function(d) {
            var c, h;
            if ("horizontal" == this.orientation) {
                c = this.elementSize.width;
                h = d.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left: 0)
            } else {
                c = this.elementSize.height;
                h = d.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top: 0)
            }
            var f = (h / c);
            if (f > 1) {
                f = 1
            }
            if (f < 0) {
                f = 0
            }
            if ("vertical" == this.orientation) {
                f = 1 - f
            }
            var e = this._valueMax() - this._valueMin(),
            i = f * e,
            b = i % this.options.step,
            g = this._valueMin() + i - b;
            if (b > (this.options.step / 2)) {
                g += this.options.step
            }
            return parseFloat(g.toFixed(5))
        },
        _start: function(d, c) {
            var b = {
                handle: this.handles[c],
                value: this.value()
            };
            if (this.options.values && this.options.values.length) {
                b.value = this.values(c);
                b.values = this.values()
            }
            this._trigger("start", d, b)
        },
        _slide: function(f, e, d) {
            var g = this.handles[e];
            if (this.options.values && this.options.values.length) {
                var b = this.values(e ? 0 : 1);
                if ((this.options.values.length == 2 && this.options.range === true) && ((e == 0 && d > b) || (e == 1 && d < b))) {
                    d = b
                }
                if (d != this.values(e)) {
                    var c = this.values();
                    c[e] = d;
                    var h = this._trigger("slide", f, {
                        handle: this.handles[e],
                        value: d,
                        values: c
                    });
                    var b = this.values(e ? 0 : 1);
                    if (h !== false) {
                        this.values(e, d, (f.type == "mousedown" && this.options.animate), true)
                    }
                }
            } else {
                if (d != this.value()) {
                    var h = this._trigger("slide", f, {
                        handle: this.handles[e],
                        value: d
                    });
                    if (h !== false) {
                        this._setData("value", d, (f.type == "mousedown" && this.options.animate))
                    }
                }
            }
        },
        _stop: function(d, c) {
            var b = {
                handle: this.handles[c],
                value: this.value()
            };
            if (this.options.values && this.options.values.length) {
                b.value = this.values(c);
                b.values = this.values()
            }
            this._trigger("stop", d, b)
        },
        _change: function(d, c) {
            var b = {
                handle: this.handles[c],
                value: this.value()
            };
            if (this.options.values && this.options.values.length) {
                b.value = this.values(c);
                b.values = this.values()
            }
            this._trigger("change", d, b)
        },
        value: function(b) {
            if (arguments.length) {
                this._setData("value", b);
                this._change(null, 0)
            }
            return this._value()
        },
        values: function(b, e, c, d) {
            if (arguments.length > 1) {
                this.options.values[b] = e;
                this._refreshValue(c);
                if (!d) {
                    this._change(null, b)
                }
            }
            if (arguments.length) {
                if (this.options.values && this.options.values.length) {
                    return this._values(b)
                } else {
                    return this.value()
                }
            } else {
                return this._values()
            }
        },
        _setData: function(b, d, c) {
            a.widget.prototype._setData.apply(this, arguments);
            switch (b) {
            case "disabled":
                if (d) {
                    this.handles.filter(".ui-state-focus").blur();
                    this.handles.removeClass("ui-state-hover");
                    this.handles.attr("disabled", "disabled")
                } else {
                    this.handles.removeAttr("disabled")
                }
            case "orientation":
                this._detectOrientation();
                this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-" + this.orientation);
                this._refreshValue(c);
                break;
            case "value":
                this._refreshValue(c);
                break
            }
        },
        _step: function() {
            var b = this.options.step;
            return b
        },
        _value: function() {
            var b = this.options.value;
            if (b < this._valueMin()) {
                b = this._valueMin()
            }
            if (b > this._valueMax()) {
                b = this._valueMax()
            }
            return b
        },
        _values: function(b) {
            if (arguments.length) {
                var c = this.options.values[b];
                if (c < this._valueMin()) {
                    c = this._valueMin()
                }
                if (c > this._valueMax()) {
                    c = this._valueMax()
                }
                return c
            } else {
                return this.options.values
            }
        },
        _valueMin: function() {
            var b = this.options.min;
            return b
        },
        _valueMax: function() {
            var b = this.options.max;
            return b
        },
        _refreshValue: function(c) {
            var f = this.options.range,
            d = this.options,
            l = this;
            if (this.options.values && this.options.values.length) {
                var i, h;
                this.handles.each(function(p, n) {
                    var o = (l.values(p) - l._valueMin()) / (l._valueMax() - l._valueMin()) * 100;
                    var m = {};
                    m[l.orientation == "horizontal" ? "left": "bottom"] = o + "%";
                    a(this).stop(1, 1)[c ? "animate": "css"](m, d.animate);
                    if (l.options.range === true) {
                        if (l.orientation == "horizontal") { (p == 0) && l.range.stop(1, 1)[c ? "animate": "css"]({
                                left: o + "%"
                            },
                            d.animate); (p == 1) && l.range[c ? "animate": "css"]({
                                width: (o - lastValPercent) + "%"
                            },
                            {
                                queue: false,
                                duration: d.animate
                            })
                        } else { (p == 0) && l.range.stop(1, 1)[c ? "animate": "css"]({
                                bottom: (o) + "%"
                            },
                            d.animate); (p == 1) && l.range[c ? "animate": "css"]({
                                height: (o - lastValPercent) + "%"
                            },
                            {
                                queue: false,
                                duration: d.animate
                            })
                        }
                    }
                    lastValPercent = o
                })
            } else {
                var j = this.value(),
                g = this._valueMin(),
                k = this._valueMax(),
                e = k != g ? (j - g) / (k - g) * 100 : 0;
                var b = {};
                b[l.orientation == "horizontal" ? "left": "bottom"] = e + "%";
                this.handle.stop(1, 1)[c ? "animate": "css"](b, d.animate); (f == "min") && (this.orientation == "horizontal") && this.range.stop(1, 1)[c ? "animate": "css"]({
                    width: e + "%"
                },
                d.animate); (f == "max") && (this.orientation == "horizontal") && this.range[c ? "animate": "css"]({
                    width: (100 - e) + "%"
                },
                {
                    queue: false,
                    duration: d.animate
                }); (f == "min") && (this.orientation == "vertical") && this.range.stop(1, 1)[c ? "animate": "css"]({
                    height: e + "%"
                },
                d.animate); (f == "max") && (this.orientation == "vertical") && this.range[c ? "animate": "css"]({
                    height: (100 - e) + "%"
                },
                {
                    queue: false,
                    duration: d.animate
                })
            }
        }
    }));
    a.extend(a.ui.slider, {
        getter: "value values",
        version: "1.7.3",
        eventPrefix: "slide",
        defaults: {
            animate: false,
            delay: 0,
            distance: 0,
            max: 100,
            min: 0,
            orientation: "horizontal",
            range: false,
            step: 1,
            value: 0,
            values: null
        }
    })
})(jQuery);;; (function(c) {
    function l(a, b) {
        function e(f) {
            f = c[a][f] || [];
            return typeof f == "string" ? f.split(/,?\s+/) : f
        }
        var d = e("getter");
        return c.inArray(b, d) != -1
    }
    c.fn.jPlayer = function(a) {
        var b = typeof a == "string",
        e = Array.prototype.slice.call(arguments, 1);
        if (b && a.substring(0, 1) == "_") return this;
        if (b && l("jPlayer", a, e)) {
            var d = c.data(this[0], "jPlayer");
            return d ? d[a].apply(d, e) : undefined
        }
        return this.each(function() {
            var f = c.data(this, "jPlayer"); ! f && !b && c.data(this, "jPlayer", new c.jPlayer(this, a))._init();
            f && b && c.isFunction(f[a]) && f[a].apply(f, e)
        })
    };
    c.jPlayer = function(a, b) {
        this.options = c.extend({},
        b);
        this.element = c(a)
    };
    c.jPlayer.getter = "jPlayerOnProgressChange jPlayerOnSoundComplete jPlayerVolume jPlayerReady getData jPlayerController";
    c.jPlayer.defaults = {
        cssPrefix: "jqjp",
        swfPath: "js",
        volume: 80,
        oggSupport: false,
        nativeSupport: true,
        customCssIds: false,
        graphicsFix: true,
        errorAlerts: false,
        warningAlerts: false,
        position: "absolute",
        width: "0",
        height: "0",
        top: "0",
        left: "0",
        quality: "high",
        bgcolor: "#ffffff"
    };
    c.jPlayer._config = {
        version: "1.1.0",
        swfVersionRequired: "1.1.0",
        swfVersion: "unknown",
        jPlayerControllerId: undefined,
        delayedCommandId: undefined,
        isWaitingForPlay: false,
        isFileSet: false
    };
    c.jPlayer._diag = {
        isPlaying: false,
        src: "",
        loadPercent: 0,
        playedPercentRelative: 0,
        playedPercentAbsolute: 0,
        playedTime: 0,
        totalTime: 0
    };
    c.jPlayer._cssId = {
        play: "jplayer_play",
        pause: "jplayer_pause",
        stop: "jplayer_stop",
        loadBar: "jplayer_load_bar",
        playBar: "jplayer_play_bar",
        volumeMin: "jplayer_volume_min",
        volumeMax: "jplayer_volume_max",
        volumeBar: "jplayer_volume_bar",
        volumeBarValue: "jplayer_volume_bar_value"
    };
    c.jPlayer.count = 0;
    c.jPlayer.timeFormat = {
        showHour: false,
        showMin: true,
        showSec: true,
        padHour: false,
        padMin: true,
        padSec: true,
        sepHour: ":",
        sepMin: ":",
        sepSec: ""
    };
    c.jPlayer.convertTime = function(a) {
        var b = new Date(a),
        e = b.getUTCHours();
        a = b.getUTCMinutes();
        b = b.getUTCSeconds();
        e = c.jPlayer.timeFormat.padHour && e < 10 ? "0" + e: e;
        a = c.jPlayer.timeFormat.padMin && a < 10 ? "0" + a: a;
        b = c.jPlayer.timeFormat.padSec && b < 10 ? "0" + b: b;
        return (c.jPlayer.timeFormat.showHour ? e + c.jPlayer.timeFormat.sepHour: "") + (c.jPlayer.timeFormat.showMin ? a + c.jPlayer.timeFormat.sepMin: "") + (c.jPlayer.timeFormat.showSec ? b + c.jPlayer.timeFormat.sepSec: "")
    };
    c.jPlayer.prototype = {
        _init: function() {
            var a = this,
            b = this.element;
            this.config = c.extend({},
            c.jPlayer.defaults, this.options, c.jPlayer._config);
            this.config.diag = c.extend({},
            c.jPlayer._diag);
            this.config.cssId = {};
            this.config.cssSelector = {};
            this.config.cssDisplay = {};
            this.config.clickHandler = {};
            this.element.data("jPlayer.config", this.config);
            c.extend(this.config, {
                id: this.element.attr("id"),
                swf: this.config.swfPath + (this.config.swfPath != "" && this.config.swfPath.slice( - 1) != "/" ? "/": "") + "Jplayer.swf",
                fid: this.config.cssPrefix + "_flash_" + c.jPlayer.count,
                aid: this.config.cssPrefix + "_audio_" + c.jPlayer.count,
                hid: this.config.cssPrefix + "_force_" + c.jPlayer.count,
                i: c.jPlayer.count,
                volume: this._limitValue(this.config.volume, 0, 100)
            });
            c.jPlayer.count++;
            if (this.config.ready != undefined) if (c.isFunction(this.config.ready)) this.jPlayerReadyCustom = this.config.ready;
            else this._warning("Constructor's ready option is not a function.");
            try {
                this.config.audio = new Audio;
                this.config.audio.id = this.config.aid;
                this.element.append(this.config.audio)
            } catch(e) {
                this.config.audio = {}
            }
            c.extend(this.config, {
                canPlayMP3: !!(this.config.audio.canPlayType ? "" != this.config.audio.canPlayType("audio/mpeg") && "no" != this.config.audio.canPlayType("audio/mpeg") : false),
                canPlayOGG: !!(this.config.audio.canPlayType ? "" != this.config.audio.canPlayType("audio/ogg") && "no" != this.config.audio.canPlayType("audio/ogg") : false),
                aSel: c("#" + this.config.aid)
            });
            c.extend(this.config, {
                html5: !!(this.config.oggSupport ? this.config.canPlayOGG ? true: this.config.canPlayMP3: this.config.canPlayMP3)
            });
            c.extend(this.config, {
                usingFlash: !(this.config.html5 && this.config.nativeSupport),
                usingMP3: !(this.config.oggSupport && this.config.canPlayOGG && this.config.nativeSupport)
            });
            var d = {
                setButtons: function(h, g) {
                    a.config.diag.isPlaying = g;
                    if (a.config.cssId.play != undefined && a.config.cssId.pause != undefined) if (g) {
                        a.config.cssSelector.play.css("display", "none");
                        a.config.cssSelector.pause.css("display", a.config.cssDisplay.pause)
                    } else {
                        a.config.cssSelector.play.css("display", a.config.cssDisplay.play);
                        a.config.cssSelector.pause.css("display", "none")
                    }
                    if (g) a.config.isWaitingForPlay = false
                }
            },
            f = {
                setFile: function(h, g) {
                    try {
                        a._getMovie().fl_setFile_mp3(g);
                        a.config.diag.src = g;
                        a.config.isFileSet = true;
                        b.trigger("jPlayer.setButtons", false)
                    } catch(j) {
                        a._flashError(j)
                    }
                },
                clearFile: function() {
                    try {
                        b.trigger("jPlayer.setButtons", false);
                        a._getMovie().fl_clearFile_mp3();
                        a.config.diag.src = "";
                        a.config.isFileSet = false
                    } catch(h) {
                        a._flashError(h)
                    }
                },
                play: function() {
                    try {
                        a._getMovie().fl_play_mp3() && b.trigger("jPlayer.setButtons", true)
                    } catch(h) {
                        a._flashError(h)
                    }
                },
                pause: function() {
                    try {
                        a._getMovie().fl_pause_mp3() && b.trigger("jPlayer.setButtons", false)
                    } catch(h) {
                        a._flashError(h)
                    }
                },
                stop: function() {
                    try {
                        a._getMovie().fl_stop_mp3() && b.trigger("jPlayer.setButtons", false)
                    } catch(h) {
                        a._flashError(h)
                    }
                },
                playHead: function(h, g) {
                    try {
                        a._getMovie().fl_play_head_mp3(g) && b.trigger("jPlayer.setButtons", true)
                    } catch(j) {
                        a._flashError(j)
                    }
                },
                playHeadTime: function(h, g) {
                    try {
                        a._getMovie().fl_play_head_time_mp3(g) && b.trigger("jPlayer.setButtons", true)
                    } catch(j) {
                        a._flashError(j)
                    }
                },
                volume: function(h, g) {
                    a.config.volume = g;
                    try {
                        a._getMovie().fl_volume_mp3(g)
                    } catch(j) {
                        a._flashError(j)
                    }
                }
            },
            k = {
                setFile: function(h, g, j) {
                    a.config.audio = new Audio;
                    a.config.audio.id = a.config.aid;
                    a.config.aSel.replaceWith(a.config.audio);
                    a.config.aSel = c("#" + a.config.aid);
                    a.config.diag.src = a.config.usingMP3 ? g: j;
                    a.config.isWaitingForPlay = true;
                    a.config.isFileSet = true;
                    b.trigger("jPlayer.setButtons", false);
                    a.jPlayerOnProgressChange(0, 0, 0, 0, 0);
                    clearInterval(a.config.jPlayerControllerId);
                    a.config.audio.addEventListener("canplay",
                    function() {
                        a.config.audio.volume = a.config.volume / 100
                    },
                    false)
                },
                clearFile: function() {
                    a.setFile("", "");
                    a.config.isWaitingForPlay = false;
                    a.config.isFileSet = false
                },
                play: function() {
                    if (a.config.isFileSet) {
                        if (a.config.isWaitingForPlay) a.config.audio.src = a.config.diag.src;
                        a.config.audio.play();
                        b.trigger("jPlayer.setButtons", true);
                        clearInterval(a.config.jPlayerControllerId);
                        a.config.jPlayerControllerId = window.setInterval(function() {
                            a.jPlayerController(false)
                        },
                        100);
                        clearInterval(a.config.delayedCommandId)
                    }
                },
                pause: function() {
                    if (a.config.isFileSet) {
                        a.config.audio.pause();
                        b.trigger("jPlayer.setButtons", false)
                    }
                },
                stop: function() {
                    if (a.config.isFileSet) try {
                        a.config.audio.currentTime = 0;
                        b.trigger("jPlayer.pause");
                        clearInterval(a.config.jPlayerControllerId);
                        a.config.jPlayerControllerId = window.setInterval(function() {
                            a.jPlayerController(true)
                        },
                        100)
                    } catch(h) {
                        clearInterval(a.config.delayedCommandId);
                        a.config.delayedCommandId = window.setTimeout(function() {
                            a.stop()
                        },
                        100)
                    }
                },
                playHead: function(h, g) {
                    if (a.config.isFileSet) try {
                        a.config.audio.currentTime = typeof a.config.audio.buffered == "object" && a.config.audio.buffered.length > 0 ? g * a.config.audio.buffered.end(a.config.audio.buffered.length - 1) / 100 : g * a.config.audio.duration / 100;
                        b.trigger("jPlayer.play")
                    } catch(j) {
                        clearInterval(a.config.delayedCommandId);
                        a.config.delayedCommandId = window.setTimeout(function() {
                            a.playHead(g)
                        },
                        100)
                    }
                },
                playHeadTime: function(h, g) {
                    if (a.config.isFileSet) try {
                        a.config.audio.currentTime = g / 1E3;
                        b.trigger("jPlayer.play")
                    } catch(j) {
                        clearInterval(a.config.delayedCommandId);
                        a.config.delayedCommandId = window.setTimeout(function() {
                            a.playHeadTime(g)
                        },
                        100)
                    }
                },
                volume: function(h, g) {
                    a.config.volume = g;
                    a.config.audio.volume = g / 100;
                    a.jPlayerVolume(g)
                }
            };
            this.config.usingFlash ? c.extend(d, f) : c.extend(d, k);
            for (var i in d) {
                f = "jPlayer." + i;
                this.element.unbind(f);
                this.element.bind(f, d[i])
            }
            if (this.config.usingFlash) if (this._checkForFlash(8)) if (c.browser.msie) {
                i = '<object id="' + this.config.fid + '"';
                i += ' classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"';
                i += ' codebase="' + document.URL.substring(0, document.URL.indexOf(":")) + '://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab"';
                i += ' type="application/x-shockwave-flash"';
                i += ' width="' + this.config.width + '" height="' + this.config.height + '">';
                i += "</object>";
                d = [];
                d[0] = '<param name="movie" value="' + this.config.swf + '" />';
                d[1] = '<param name="quality" value="high" />';
                d[2] = '<param name="FlashVars" value="id=' + escape(this.config.id) + "&fid=" + escape(this.config.fid) + "&vol=" + this.config.volume + '" />';
                d[3] = '<param name="allowScriptAccess" value="always" />';
                d[4] = '<param name="bgcolor" value="' + this.config.bgcolor + '" />';
                i = document.createElement(i);
                for (f = 0; f < d.length; f++) i.appendChild(document.createElement(d[f]));
                this.element.html(i)
            } else {
                d = '<embed name="' + this.config.fid + '" id="' + this.config.fid + '" src="' + this.config.swf + '"';
                d += ' width="' + this.config.width + '" height="' + this.config.height + '" bgcolor="' + this.config.bgcolor + '"';
                d += ' quality="high" FlashVars="id=' + escape(this.config.id) + "&fid=" + escape(this.config.fid) + "&vol=" + this.config.volume + '"';
                d += ' allowScriptAccess="always"';
                d += ' type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
                this.element.html(d)
            } else this.element.html("<p>Flash 8 or above is not installed. <a href='http://get.adobe.com/flashplayer'>Get Flash!</a></p>");
            this.element.css({
                position: this.config.position,
                top: this.config.top,
                left: this.config.left
            });
            if (this.config.graphicsFix) {
                this.element.append('<div id="' + this.config.hid + '"></div>');
                c.extend(this.config, {
                    hSel: c("#" + this.config.hid)
                });
                this.config.hSel.css({
                    "text-indent": "-9999px"
                })
            }
            this.config.customCssIds || c.each(c.jPlayer._cssId,
            function(h, g) {
                a.cssId(h, g)
            });
            if (!this.config.usingFlash) {
                this.element.css({
                    left: "-9999px"
                });
                window.setTimeout(function() {
                    a.volume(a.config.volume);
                    a.jPlayerReady()
                },
                100)
            }
        },
        jPlayerReady: function(a) {
            if (this.config.usingFlash) {
                this.config.swfVersion = a;
                this.config.swfVersionRequired != this.config.swfVersion && this._error("jPlayer's JavaScript / SWF version mismatch!\n\nJavaScript requires SWF : " + this.config.swfVersionRequired + "\nThe Jplayer.swf used is : " + this.config.swfVersion)
            } else this.config.swfVersion = "n/a";
            this.jPlayerReadyCustom()
        },
        jPlayerReadyCustom: function() {},
        setFile: function(a, b) {
            this.element.trigger("jPlayer.setFile", [a, b])
        },
        clearFile: function() {
            this.element.trigger("jPlayer.clearFile")
        },
        play: function() {
            this.element.trigger("jPlayer.play")
        },
        pause: function() {
            this.element.trigger("jPlayer.pause")
        },
        stop: function() {
            this.element.trigger("jPlayer.stop")
        },
        playHead: function(a) {
            this.element.trigger("jPlayer.playHead", [a])
        },
        playHeadTime: function(a) {
            this.element.trigger("jPlayer.playHeadTime", [a])
        },
        volume: function(a) {
            a = this._limitValue(a, 0, 100);
            this.element.trigger("jPlayer.volume", [a])
        },
        cssId: function(a, b) {
            var e = this;
            if (typeof b == "string") if (c.jPlayer._cssId[a]) {
                this.config.cssId[a] != undefined && this.config.cssSelector[a].unbind("click", this.config.clickHandler[a]);
                this.config.cssId[a] = b;
                this.config.cssSelector[a] = c("#" + b);
                this.config.clickHandler[a] = function(d) {
                    e[a](d);
                    return false
                };
                this.config.cssSelector[a].click(this.config.clickHandler[a]);
                this.config.cssDisplay[a] = this.config.cssSelector[a].css("display");
                a == "pause" && this.config.cssSelector[a].css("display", "none")
            } else this._warning("Unknown/Illegal function in cssId\n\njPlayer('cssId', '" + a + "', '" + b + "')");
            else this._warning("cssId CSS Id must be a string\n\njPlayer('cssId', '" + a + "', " + b + ")")
        },
        loadBar: function(a) {
            if (this.config.cssId.loadBar != undefined) {
                var b = this.config.cssSelector.loadBar.offset();
                a = a.pageX - b.left;
                b = this.config.cssSelector.loadBar.width();
                this.playHead(100 * a / b)
            }
        },
        playBar: function(a) {
            this.loadBar(a)
        },
        onProgressChange: function(a) {
            if (c.isFunction(a)) this.onProgressChangeCustom = a;
            else this._warning("onProgressChange parameter is not a function.")
        },
        onProgressChangeCustom: function() {},
        jPlayerOnProgressChange: function(a, b, e, d, f) {
            this.config.diag.loadPercent = a;
            this.config.diag.playedPercentRelative = b;
            this.config.diag.playedPercentAbsolute = e;
            this.config.diag.playedTime = d;
            this.config.diag.totalTime = f;
            this.config.cssId.loadBar != undefined && this.config.cssSelector.loadBar.width(a + "%");
            this.config.cssId.playBar != undefined && this.config.cssSelector.playBar.width(b + "%");
            this.onProgressChangeCustom(a, b, e, d, f);
            this._forceUpdate()
        },
        jPlayerController: function(a) {
            var b = 0,
            e = 0,
            d = 0,
            f = 0,
            k = 0;
            if (this.config.audio.readyState >= 1) {
                b = this.config.audio.currentTime * 1E3;
                e = this.config.audio.duration * 1E3;
                e = isNaN(e) ? 0 : e;
                d = e > 0 ? 100 * b / e: 0;
                if (typeof this.config.audio.buffered == "object" && this.config.audio.buffered.length > 0) {
                    f = 100 * this.config.audio.buffered.end(this.config.audio.buffered.length - 1) / this.config.audio.duration;
                    k = 100 * this.config.audio.currentTime / this.config.audio.buffered.end(this.config.audio.buffered.length - 1)
                } else {
                    f = 100;
                    k = d
                }
            }
            if (this.config.audio.ended) {
                clearInterval(this.config.jPlayerControllerId);
                this.jPlayerOnSoundComplete()
            } else ! this.config.diag.isPlaying && f >= 100 && clearInterval(this.config.jPlayerControllerId);
            a ? this.jPlayerOnProgressChange(f, 0, 0, 0, e) : this.jPlayerOnProgressChange(f, k, d, b, e)
        },
        volumeMin: function() {
            this.volume(0)
        },
        volumeMax: function() {
            this.volume(100)
        },
        volumeBar: function(a) {
            if (this.config.cssId.volumeBar != undefined) {
                var b = this.config.cssSelector.volumeBar.offset();
                a = a.pageX - b.left;
                b = this.config.cssSelector.volumeBar.width();
                this.volume(100 * a / b)
            }
        },
        volumeBarValue: function(a) {
            this.volumeBar(a)
        },
        jPlayerVolume: function(a) {
            if (this.config.cssId.volumeBarValue != null) {
                this.config.cssSelector.volumeBarValue.width(a + "%");
                this._forceUpdate()
            }
        },
        onSoundComplete: function(a) {
            if (c.isFunction(a)) this.onSoundCompleteCustom = a;
            else this._warning("onSoundComplete parameter is not a function.")
        },
        onSoundCompleteCustom: function() {},
        jPlayerOnSoundComplete: function() {
            this.element.trigger("jPlayer.setButtons", false);
            this.onSoundCompleteCustom()
        },
        getData: function(a) {
            for (var b = a.split("."), e = this.config, d = 0; d < b.length; d++) if (e[b[d]] != undefined) e = e[b[d]];
            else {
                this._warning("Undefined data requested.\n\njPlayer('getData', '" + a + "')");
                return
            }
            return e
        },
        _getMovie: function() {
            return document[this.config.fid]
        },
        _checkForFlash: function(a) {
            var b = false,
            e;
            if (window.ActiveXObject) try {
                new ActiveXObject("ShockwaveFlash.ShockwaveFlash." + a);
                b = true
            } catch(d) {} else if (navigator.plugins && navigator.mimeTypes.length > 0) if (e = navigator.plugins["Shockwave Flash"]) if (navigator.plugins["Shockwave Flash"].description.replace(/.*\s(\d+\.\d+).*/, "$1") >= a) b = true;
            return b
        },
        _forceUpdate: function() {
            this.config.graphicsFix && this.config.hSel.text("" + Math.random())
        },
        _limitValue: function(a, b, e) {
            return a < b ? b: a > e ? e: a
        },
        _flashError: function(a) {
            this._error("Problem with Flash component.\n\nCheck the swfPath points at the Jplayer.swf path.\n\nswfPath = " + this.config.swfPath + "\nurl: " + this.config.swf + "\n\nError: " + a.message)
        },
        _error: function(a) {
            this.config.errorAlerts && this._alert("Error!\n\n" + a)
        },
        _warning: function(a) {
            this.config.warningAlerts && this._alert("Warning!\n\n" + a)
        },
        _alert: function(a) {
            alert("jPlayer " + this.config.version + " : id='" + this.config.id + "' : " + a)
        }
    }
})(jQuery);;
Drupal.behaviors.skyPlayer = function(context) {
    if ($("#jpId").size() == 0) return;
    var moving = false;
    $("#indicator_box").css("top", $("#1").offset().top + "px");
    $("#indicator_box").css("width", $("#player_container").width() + "px");
    $("#show_indicator").css("display", "none");
    $(window).scroll(function() {
        if ($(window).scrollTop() > $("#player_container").offset().top) {
            $("#player_control_container").css("position", "fixed");
            $("#player_control_container").css("top", 0);
        } else {
            $("#player_control_container").css("position", "static");
        }
    });
    $("#show_indicator").click(function() {
        $("#indicator_box").css("display", "block");
        $("#show_indicator").css("display", "none");
        $("#hide_indicator").css("display", "block");
    });
    $("#hide_indicator").click(function() {
        $("#indicator_box").css("display", "none");
        $("#hide_indicator").css("display", "none");
        $("#show_indicator").css("display", "block");
    });
    $("#zoom_out").click(function() {
        var origin_font_size = parseInt($(".content").css("font-size").replace("px", ""));
        $(".content").css("font-size", origin_font_size - 1 + "px");
    });
    $("#zoom_in").click(function() {
        var origin_font_size = parseInt($(".content").css("font-size").replace("px", ""));
        $(".content").css("font-size", origin_font_size + 1 + "px");
    });
    function moveIndicator(pos, force) {
        if (!force) {
            if ($("#indicator_box").offset().top == pos || moving) return;
        }
        moving = true;
        var buttomMargin = Math.max($("#indicator_box").height(), $("#player_control_container").height()) + 20;
        if ($(window).scrollTop() + $(window).height() < pos + $("#indicator_box").height() || $(window).scrollTop() > pos - buttomMargin) {
            $("html:not(:animated),body:not(:animated)").animate({
                scrollTop: pos - buttomMargin
            },
            2000);
        }
        $("#indicator_box").animate({
            "top": pos + "px"
        },
        500,
        function() {
            moving = false;
        });
    }
    function timeIndexedById(id) {
        if (id >= times_indexed_by_id.length) return times_indexed_by_id[times_indexed_by_id.length - 1];
        return times_indexed_by_id[id];
    }
    function idIndexedByTime(t) {
        if (t >= ids_index_by_time.length) return ids_index_by_time[ids_index_by_time.length - 1];
        if (t < 0 || ids_index_by_time[t] <= 0) return 1;
        return ids_index_by_time[t];
    }
    function changePosition(event, ui) {
        if (event.originalEvent) $("#jpId").jPlayer("playHead", $("#slider").slider("value"));
    }
    $('.content span').bind("click",
    function(e) {
        var spanOff = $("#" + this.id).offset();
        moveIndicator(spanOff.top, true);
        $("#jpId").jPlayer("playHeadTime", timeIndexedById(this.id) * 1000);
    });
    $("#slider").slider({
        min: 0,
        max: 100,
        value: 0,
        animate: false,
        slide: changePosition,
        change: changePosition
    });
    var lastPlayed = 0;
    $("#jpId").jPlayer({
        nativeSupport: false,
        errorAlerts: true,
        warningAlerts: true,
        volume: 100,
        swfPath: "/js",
        ready: function() {
            var audioFile = $("#mp3audiofile").text();
            this.element.jPlayer("setFile", audioFile).jPlayer("play");
        }
    }).jPlayer("cssId", "play", "player_play").jPlayer("cssId", "pause", "player_pause").jPlayer("cssId", "stop", "player_stop").jPlayer("onProgressChange",
    function(lp, ppr, ppa, pt, tt) {
        if (Math.abs(pt - lastPlayed) < 1000) return;
        lastPlayed = pt;
        $("#slider").slider("value", ppr);
        var t = Math.round(pt / 1000);
        var spanId = idIndexedByTime(t);
        var spanOff = $("#" + spanId).offset();
        moveIndicator(spanOff.top, false);
    });
};