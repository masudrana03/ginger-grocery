;(() => {
  var e = {
      7244: (e, t, n) => {
        'use strict'
        n.r(t),
          n.d(t, {
            Alert: () => bt,
            Button: () => wt,
            Carousel: () => Ht,
            Collapse: () => Xt,
            Dropdown: () => hn,
            Modal: () => Bn,
            Offcanvas: () => Yn,
            Popover: () => bi,
            ScrollSpy: () => Ai,
            Tab: () => Li,
            Toast: () => qi,
            Tooltip: () => gi,
          })
        var i = {}
        n.r(i),
          n.d(i, {
            afterMain: () => E,
            afterRead: () => _,
            afterWrite: () => A,
            applyStyles: () => j,
            arrow: () => J,
            auto: () => l,
            basePlacements: () => c,
            beforeMain: () => w,
            beforeRead: () => y,
            beforeWrite: () => T,
            bottom: () => o,
            clippingParents: () => f,
            computeStyles: () => te,
            createPopper: () => Ne,
            createPopperBase: () => De,
            createPopperLite: () => Le,
            detectOverflow: () => ve,
            end: () => d,
            eventListeners: () => ie,
            flip: () => ye,
            hide: () => we,
            left: () => a,
            main: () => x,
            modifierPhases: () => k,
            offset: () => xe,
            placements: () => v,
            popper: () => h,
            popperGenerator: () => Oe,
            popperOffsets: () => Ee,
            preventOverflow: () => Te,
            read: () => b,
            reference: () => g,
            right: () => s,
            start: () => u,
            top: () => r,
            variationPlacements: () => m,
            viewport: () => p,
            write: () => C,
          })
        var r = 'top',
          o = 'bottom',
          s = 'right',
          a = 'left',
          l = 'auto',
          c = [r, o, s, a],
          u = 'start',
          d = 'end',
          f = 'clippingParents',
          p = 'viewport',
          h = 'popper',
          g = 'reference',
          m = c.reduce(function (e, t) {
            return e.concat([t + '-' + u, t + '-' + d])
          }, []),
          v = [].concat(c, [l]).reduce(function (e, t) {
            return e.concat([t, t + '-' + u, t + '-' + d])
          }, []),
          y = 'beforeRead',
          b = 'read',
          _ = 'afterRead',
          w = 'beforeMain',
          x = 'main',
          E = 'afterMain',
          T = 'beforeWrite',
          C = 'write',
          A = 'afterWrite',
          k = [y, b, _, w, x, E, T, C, A]
        function S(e) {
          return e ? (e.nodeName || '').toLowerCase() : null
        }
        function O(e) {
          if (null == e) return window
          if ('[object Window]' !== e.toString()) {
            var t = e.ownerDocument
            return (t && t.defaultView) || window
          }
          return e
        }
        function D(e) {
          return e instanceof O(e).Element || e instanceof Element
        }
        function N(e) {
          return e instanceof O(e).HTMLElement || e instanceof HTMLElement
        }
        function L(e) {
          return (
            'undefined' != typeof ShadowRoot &&
            (e instanceof O(e).ShadowRoot || e instanceof ShadowRoot)
          )
        }
        const j = {
          name: 'applyStyles',
          enabled: !0,
          phase: 'write',
          fn: function (e) {
            var t = e.state
            Object.keys(t.elements).forEach(function (e) {
              var n = t.styles[e] || {},
                i = t.attributes[e] || {},
                r = t.elements[e]
              N(r) &&
                S(r) &&
                (Object.assign(r.style, n),
                Object.keys(i).forEach(function (e) {
                  var t = i[e]
                  !1 === t
                    ? r.removeAttribute(e)
                    : r.setAttribute(e, !0 === t ? '' : t)
                }))
            })
          },
          effect: function (e) {
            var t = e.state,
              n = {
                popper: {
                  position: t.options.strategy,
                  left: '0',
                  top: '0',
                  margin: '0',
                },
                arrow: { position: 'absolute' },
                reference: {},
              }
            return (
              Object.assign(t.elements.popper.style, n.popper),
              (t.styles = n),
              t.elements.arrow &&
                Object.assign(t.elements.arrow.style, n.arrow),
              function () {
                Object.keys(t.elements).forEach(function (e) {
                  var i = t.elements[e],
                    r = t.attributes[e] || {},
                    o = Object.keys(
                      t.styles.hasOwnProperty(e) ? t.styles[e] : n[e],
                    ).reduce(function (e, t) {
                      return (e[t] = ''), e
                    }, {})
                  N(i) &&
                    S(i) &&
                    (Object.assign(i.style, o),
                    Object.keys(r).forEach(function (e) {
                      i.removeAttribute(e)
                    }))
                })
              }
            )
          },
          requires: ['computeStyles'],
        }
        function $(e) {
          return e.split('-')[0]
        }
        var P = Math.max,
          I = Math.min,
          H = Math.round
        function M(e, t) {
          void 0 === t && (t = !1)
          var n = e.getBoundingClientRect(),
            i = 1,
            r = 1
          if (N(e) && t) {
            var o = e.offsetHeight,
              s = e.offsetWidth
            s > 0 && (i = H(n.width) / s || 1),
              o > 0 && (r = H(n.height) / o || 1)
          }
          return {
            width: n.width / i,
            height: n.height / r,
            top: n.top / r,
            right: n.right / i,
            bottom: n.bottom / r,
            left: n.left / i,
            x: n.left / i,
            y: n.top / r,
          }
        }
        function q(e) {
          var t = M(e),
            n = e.offsetWidth,
            i = e.offsetHeight
          return (
            Math.abs(t.width - n) <= 1 && (n = t.width),
            Math.abs(t.height - i) <= 1 && (i = t.height),
            { x: e.offsetLeft, y: e.offsetTop, width: n, height: i }
          )
        }
        function R(e, t) {
          var n = t.getRootNode && t.getRootNode()
          if (e.contains(t)) return !0
          if (n && L(n)) {
            var i = t
            do {
              if (i && e.isSameNode(i)) return !0
              i = i.parentNode || i.host
            } while (i)
          }
          return !1
        }
        function B(e) {
          return O(e).getComputedStyle(e)
        }
        function W(e) {
          return ['table', 'td', 'th'].indexOf(S(e)) >= 0
        }
        function F(e) {
          return ((D(e) ? e.ownerDocument : e.document) || window.document)
            .documentElement
        }
        function z(e) {
          return 'html' === S(e)
            ? e
            : e.assignedSlot || e.parentNode || (L(e) ? e.host : null) || F(e)
        }
        function U(e) {
          return N(e) && 'fixed' !== B(e).position ? e.offsetParent : null
        }
        function V(e) {
          for (
            var t = O(e), n = U(e);
            n && W(n) && 'static' === B(n).position;

          )
            n = U(n)
          return n &&
            ('html' === S(n) || ('body' === S(n) && 'static' === B(n).position))
            ? t
            : n ||
                (function (e) {
                  var t =
                    -1 !== navigator.userAgent.toLowerCase().indexOf('firefox')
                  if (
                    -1 !== navigator.userAgent.indexOf('Trident') &&
                    N(e) &&
                    'fixed' === B(e).position
                  )
                    return null
                  for (
                    var n = z(e);
                    N(n) && ['html', 'body'].indexOf(S(n)) < 0;

                  ) {
                    var i = B(n)
                    if (
                      'none' !== i.transform ||
                      'none' !== i.perspective ||
                      'paint' === i.contain ||
                      -1 !==
                        ['transform', 'perspective'].indexOf(i.willChange) ||
                      (t && 'filter' === i.willChange) ||
                      (t && i.filter && 'none' !== i.filter)
                    )
                      return n
                    n = n.parentNode
                  }
                  return null
                })(e) ||
                t
        }
        function X(e) {
          return ['top', 'bottom'].indexOf(e) >= 0 ? 'x' : 'y'
        }
        function Y(e, t, n) {
          return P(e, I(t, n))
        }
        function K(e) {
          return Object.assign({}, { top: 0, right: 0, bottom: 0, left: 0 }, e)
        }
        function Q(e, t) {
          return t.reduce(function (t, n) {
            return (t[n] = e), t
          }, {})
        }
        const J = {
          name: 'arrow',
          enabled: !0,
          phase: 'main',
          fn: function (e) {
            var t,
              n = e.state,
              i = e.name,
              l = e.options,
              u = n.elements.arrow,
              d = n.modifiersData.popperOffsets,
              f = $(n.placement),
              p = X(f),
              h = [a, s].indexOf(f) >= 0 ? 'height' : 'width'
            if (u && d) {
              var g = (function (e, t) {
                  return K(
                    'number' !=
                      typeof (e =
                        'function' == typeof e
                          ? e(
                              Object.assign({}, t.rects, {
                                placement: t.placement,
                              }),
                            )
                          : e)
                      ? e
                      : Q(e, c),
                  )
                })(l.padding, n),
                m = q(u),
                v = 'y' === p ? r : a,
                y = 'y' === p ? o : s,
                b =
                  n.rects.reference[h] +
                  n.rects.reference[p] -
                  d[p] -
                  n.rects.popper[h],
                _ = d[p] - n.rects.reference[p],
                w = V(u),
                x = w
                  ? 'y' === p
                    ? w.clientHeight || 0
                    : w.clientWidth || 0
                  : 0,
                E = b / 2 - _ / 2,
                T = g[v],
                C = x - m[h] - g[y],
                A = x / 2 - m[h] / 2 + E,
                k = Y(T, A, C),
                S = p
              n.modifiersData[i] =
                (((t = {})[S] = k), (t.centerOffset = k - A), t)
            }
          },
          effect: function (e) {
            var t = e.state,
              n = e.options.element,
              i = void 0 === n ? '[data-popper-arrow]' : n
            null != i &&
              ('string' != typeof i ||
                (i = t.elements.popper.querySelector(i))) &&
              R(t.elements.popper, i) &&
              (t.elements.arrow = i)
          },
          requires: ['popperOffsets'],
          requiresIfExists: ['preventOverflow'],
        }
        function G(e) {
          return e.split('-')[1]
        }
        var Z = { top: 'auto', right: 'auto', bottom: 'auto', left: 'auto' }
        function ee(e) {
          var t,
            n = e.popper,
            i = e.popperRect,
            l = e.placement,
            c = e.variation,
            u = e.offsets,
            f = e.position,
            p = e.gpuAcceleration,
            h = e.adaptive,
            g = e.roundOffsets,
            m = e.isFixed,
            v = u.x,
            y = void 0 === v ? 0 : v,
            b = u.y,
            _ = void 0 === b ? 0 : b,
            w = 'function' == typeof g ? g({ x: y, y: _ }) : { x: y, y: _ }
          ;(y = w.x), (_ = w.y)
          var x = u.hasOwnProperty('x'),
            E = u.hasOwnProperty('y'),
            T = a,
            C = r,
            A = window
          if (h) {
            var k = V(n),
              S = 'clientHeight',
              D = 'clientWidth'
            k === O(n) &&
              'static' !== B((k = F(n))).position &&
              'absolute' === f &&
              ((S = 'scrollHeight'), (D = 'scrollWidth')),
              (k = k),
              (l === r || ((l === a || l === s) && c === d)) &&
                ((C = o),
                (_ -=
                  (m && A.visualViewport ? A.visualViewport.height : k[S]) -
                  i.height),
                (_ *= p ? 1 : -1)),
              (l !== a && ((l !== r && l !== o) || c !== d)) ||
                ((T = s),
                (y -=
                  (m && A.visualViewport ? A.visualViewport.width : k[D]) -
                  i.width),
                (y *= p ? 1 : -1))
          }
          var N,
            L = Object.assign({ position: f }, h && Z),
            j =
              !0 === g
                ? (function (e) {
                    var t = e.x,
                      n = e.y,
                      i = window.devicePixelRatio || 1
                    return { x: H(t * i) / i || 0, y: H(n * i) / i || 0 }
                  })({ x: y, y: _ })
                : { x: y, y: _ }
          return (
            (y = j.x),
            (_ = j.y),
            p
              ? Object.assign(
                  {},
                  L,
                  (((N = {})[C] = E ? '0' : ''),
                  (N[T] = x ? '0' : ''),
                  (N.transform =
                    (A.devicePixelRatio || 1) <= 1
                      ? 'translate(' + y + 'px, ' + _ + 'px)'
                      : 'translate3d(' + y + 'px, ' + _ + 'px, 0)'),
                  N),
                )
              : Object.assign(
                  {},
                  L,
                  (((t = {})[C] = E ? _ + 'px' : ''),
                  (t[T] = x ? y + 'px' : ''),
                  (t.transform = ''),
                  t),
                )
          )
        }
        const te = {
          name: 'computeStyles',
          enabled: !0,
          phase: 'beforeWrite',
          fn: function (e) {
            var t = e.state,
              n = e.options,
              i = n.gpuAcceleration,
              r = void 0 === i || i,
              o = n.adaptive,
              s = void 0 === o || o,
              a = n.roundOffsets,
              l = void 0 === a || a,
              c = {
                placement: $(t.placement),
                variation: G(t.placement),
                popper: t.elements.popper,
                popperRect: t.rects.popper,
                gpuAcceleration: r,
                isFixed: 'fixed' === t.options.strategy,
              }
            null != t.modifiersData.popperOffsets &&
              (t.styles.popper = Object.assign(
                {},
                t.styles.popper,
                ee(
                  Object.assign({}, c, {
                    offsets: t.modifiersData.popperOffsets,
                    position: t.options.strategy,
                    adaptive: s,
                    roundOffsets: l,
                  }),
                ),
              )),
              null != t.modifiersData.arrow &&
                (t.styles.arrow = Object.assign(
                  {},
                  t.styles.arrow,
                  ee(
                    Object.assign({}, c, {
                      offsets: t.modifiersData.arrow,
                      position: 'absolute',
                      adaptive: !1,
                      roundOffsets: l,
                    }),
                  ),
                )),
              (t.attributes.popper = Object.assign({}, t.attributes.popper, {
                'data-popper-placement': t.placement,
              }))
          },
          data: {},
        }
        var ne = { passive: !0 }
        const ie = {
          name: 'eventListeners',
          enabled: !0,
          phase: 'write',
          fn: function () {},
          effect: function (e) {
            var t = e.state,
              n = e.instance,
              i = e.options,
              r = i.scroll,
              o = void 0 === r || r,
              s = i.resize,
              a = void 0 === s || s,
              l = O(t.elements.popper),
              c = [].concat(t.scrollParents.reference, t.scrollParents.popper)
            return (
              o &&
                c.forEach(function (e) {
                  e.addEventListener('scroll', n.update, ne)
                }),
              a && l.addEventListener('resize', n.update, ne),
              function () {
                o &&
                  c.forEach(function (e) {
                    e.removeEventListener('scroll', n.update, ne)
                  }),
                  a && l.removeEventListener('resize', n.update, ne)
              }
            )
          },
          data: {},
        }
        var re = { left: 'right', right: 'left', bottom: 'top', top: 'bottom' }
        function oe(e) {
          return e.replace(/left|right|bottom|top/g, function (e) {
            return re[e]
          })
        }
        var se = { start: 'end', end: 'start' }
        function ae(e) {
          return e.replace(/start|end/g, function (e) {
            return se[e]
          })
        }
        function le(e) {
          var t = O(e)
          return { scrollLeft: t.pageXOffset, scrollTop: t.pageYOffset }
        }
        function ce(e) {
          return M(F(e)).left + le(e).scrollLeft
        }
        function ue(e) {
          var t = B(e),
            n = t.overflow,
            i = t.overflowX,
            r = t.overflowY
          return /auto|scroll|overlay|hidden/.test(n + r + i)
        }
        function de(e) {
          return ['html', 'body', '#document'].indexOf(S(e)) >= 0
            ? e.ownerDocument.body
            : N(e) && ue(e)
            ? e
            : de(z(e))
        }
        function fe(e, t) {
          var n
          void 0 === t && (t = [])
          var i = de(e),
            r = i === (null == (n = e.ownerDocument) ? void 0 : n.body),
            o = O(i),
            s = r ? [o].concat(o.visualViewport || [], ue(i) ? i : []) : i,
            a = t.concat(s)
          return r ? a : a.concat(fe(z(s)))
        }
        function pe(e) {
          return Object.assign({}, e, {
            left: e.x,
            top: e.y,
            right: e.x + e.width,
            bottom: e.y + e.height,
          })
        }
        function he(e, t) {
          return t === p
            ? pe(
                (function (e) {
                  var t = O(e),
                    n = F(e),
                    i = t.visualViewport,
                    r = n.clientWidth,
                    o = n.clientHeight,
                    s = 0,
                    a = 0
                  return (
                    i &&
                      ((r = i.width),
                      (o = i.height),
                      /^((?!chrome|android).)*safari/i.test(
                        navigator.userAgent,
                      ) || ((s = i.offsetLeft), (a = i.offsetTop))),
                    { width: r, height: o, x: s + ce(e), y: a }
                  )
                })(e),
              )
            : D(t)
            ? (function (e) {
                var t = M(e)
                return (
                  (t.top = t.top + e.clientTop),
                  (t.left = t.left + e.clientLeft),
                  (t.bottom = t.top + e.clientHeight),
                  (t.right = t.left + e.clientWidth),
                  (t.width = e.clientWidth),
                  (t.height = e.clientHeight),
                  (t.x = t.left),
                  (t.y = t.top),
                  t
                )
              })(t)
            : pe(
                (function (e) {
                  var t,
                    n = F(e),
                    i = le(e),
                    r = null == (t = e.ownerDocument) ? void 0 : t.body,
                    o = P(
                      n.scrollWidth,
                      n.clientWidth,
                      r ? r.scrollWidth : 0,
                      r ? r.clientWidth : 0,
                    ),
                    s = P(
                      n.scrollHeight,
                      n.clientHeight,
                      r ? r.scrollHeight : 0,
                      r ? r.clientHeight : 0,
                    ),
                    a = -i.scrollLeft + ce(e),
                    l = -i.scrollTop
                  return (
                    'rtl' === B(r || n).direction &&
                      (a += P(n.clientWidth, r ? r.clientWidth : 0) - o),
                    { width: o, height: s, x: a, y: l }
                  )
                })(F(e)),
              )
        }
        function ge(e, t, n) {
          var i =
              'clippingParents' === t
                ? (function (e) {
                    var t = fe(z(e)),
                      n =
                        ['absolute', 'fixed'].indexOf(B(e).position) >= 0 &&
                        N(e)
                          ? V(e)
                          : e
                    return D(n)
                      ? t.filter(function (e) {
                          return D(e) && R(e, n) && 'body' !== S(e)
                        })
                      : []
                  })(e)
                : [].concat(t),
            r = [].concat(i, [n]),
            o = r[0],
            s = r.reduce(function (t, n) {
              var i = he(e, n)
              return (
                (t.top = P(i.top, t.top)),
                (t.right = I(i.right, t.right)),
                (t.bottom = I(i.bottom, t.bottom)),
                (t.left = P(i.left, t.left)),
                t
              )
            }, he(e, o))
          return (
            (s.width = s.right - s.left),
            (s.height = s.bottom - s.top),
            (s.x = s.left),
            (s.y = s.top),
            s
          )
        }
        function me(e) {
          var t,
            n = e.reference,
            i = e.element,
            l = e.placement,
            c = l ? $(l) : null,
            f = l ? G(l) : null,
            p = n.x + n.width / 2 - i.width / 2,
            h = n.y + n.height / 2 - i.height / 2
          switch (c) {
            case r:
              t = { x: p, y: n.y - i.height }
              break
            case o:
              t = { x: p, y: n.y + n.height }
              break
            case s:
              t = { x: n.x + n.width, y: h }
              break
            case a:
              t = { x: n.x - i.width, y: h }
              break
            default:
              t = { x: n.x, y: n.y }
          }
          var g = c ? X(c) : null
          if (null != g) {
            var m = 'y' === g ? 'height' : 'width'
            switch (f) {
              case u:
                t[g] = t[g] - (n[m] / 2 - i[m] / 2)
                break
              case d:
                t[g] = t[g] + (n[m] / 2 - i[m] / 2)
            }
          }
          return t
        }
        function ve(e, t) {
          void 0 === t && (t = {})
          var n = t,
            i = n.placement,
            a = void 0 === i ? e.placement : i,
            l = n.boundary,
            u = void 0 === l ? f : l,
            d = n.rootBoundary,
            m = void 0 === d ? p : d,
            v = n.elementContext,
            y = void 0 === v ? h : v,
            b = n.altBoundary,
            _ = void 0 !== b && b,
            w = n.padding,
            x = void 0 === w ? 0 : w,
            E = K('number' != typeof x ? x : Q(x, c)),
            T = y === h ? g : h,
            C = e.rects.popper,
            A = e.elements[_ ? T : y],
            k = ge(D(A) ? A : A.contextElement || F(e.elements.popper), u, m),
            S = M(e.elements.reference),
            O = me({
              reference: S,
              element: C,
              strategy: 'absolute',
              placement: a,
            }),
            N = pe(Object.assign({}, C, O)),
            L = y === h ? N : S,
            j = {
              top: k.top - L.top + E.top,
              bottom: L.bottom - k.bottom + E.bottom,
              left: k.left - L.left + E.left,
              right: L.right - k.right + E.right,
            },
            $ = e.modifiersData.offset
          if (y === h && $) {
            var P = $[a]
            Object.keys(j).forEach(function (e) {
              var t = [s, o].indexOf(e) >= 0 ? 1 : -1,
                n = [r, o].indexOf(e) >= 0 ? 'y' : 'x'
              j[e] += P[n] * t
            })
          }
          return j
        }
        const ye = {
          name: 'flip',
          enabled: !0,
          phase: 'main',
          fn: function (e) {
            var t = e.state,
              n = e.options,
              i = e.name
            if (!t.modifiersData[i]._skip) {
              for (
                var d = n.mainAxis,
                  f = void 0 === d || d,
                  p = n.altAxis,
                  h = void 0 === p || p,
                  g = n.fallbackPlacements,
                  y = n.padding,
                  b = n.boundary,
                  _ = n.rootBoundary,
                  w = n.altBoundary,
                  x = n.flipVariations,
                  E = void 0 === x || x,
                  T = n.allowedAutoPlacements,
                  C = t.options.placement,
                  A = $(C),
                  k =
                    g ||
                    (A !== C && E
                      ? (function (e) {
                          if ($(e) === l) return []
                          var t = oe(e)
                          return [ae(e), t, ae(t)]
                        })(C)
                      : [oe(C)]),
                  S = [C].concat(k).reduce(function (e, n) {
                    return e.concat(
                      $(n) === l
                        ? (function (e, t) {
                            void 0 === t && (t = {})
                            var n = t,
                              i = n.placement,
                              r = n.boundary,
                              o = n.rootBoundary,
                              s = n.padding,
                              a = n.flipVariations,
                              l = n.allowedAutoPlacements,
                              u = void 0 === l ? v : l,
                              d = G(i),
                              f = d
                                ? a
                                  ? m
                                  : m.filter(function (e) {
                                      return G(e) === d
                                    })
                                : c,
                              p = f.filter(function (e) {
                                return u.indexOf(e) >= 0
                              })
                            0 === p.length && (p = f)
                            var h = p.reduce(function (t, n) {
                              return (
                                (t[n] = ve(e, {
                                  placement: n,
                                  boundary: r,
                                  rootBoundary: o,
                                  padding: s,
                                })[$(n)]),
                                t
                              )
                            }, {})
                            return Object.keys(h).sort(function (e, t) {
                              return h[e] - h[t]
                            })
                          })(t, {
                            placement: n,
                            boundary: b,
                            rootBoundary: _,
                            padding: y,
                            flipVariations: E,
                            allowedAutoPlacements: T,
                          })
                        : n,
                    )
                  }, []),
                  O = t.rects.reference,
                  D = t.rects.popper,
                  N = new Map(),
                  L = !0,
                  j = S[0],
                  P = 0;
                P < S.length;
                P++
              ) {
                var I = S[P],
                  H = $(I),
                  M = G(I) === u,
                  q = [r, o].indexOf(H) >= 0,
                  R = q ? 'width' : 'height',
                  B = ve(t, {
                    placement: I,
                    boundary: b,
                    rootBoundary: _,
                    altBoundary: w,
                    padding: y,
                  }),
                  W = q ? (M ? s : a) : M ? o : r
                O[R] > D[R] && (W = oe(W))
                var F = oe(W),
                  z = []
                if (
                  (f && z.push(B[H] <= 0),
                  h && z.push(B[W] <= 0, B[F] <= 0),
                  z.every(function (e) {
                    return e
                  }))
                ) {
                  ;(j = I), (L = !1)
                  break
                }
                N.set(I, z)
              }
              if (L)
                for (
                  var U = function (e) {
                      var t = S.find(function (t) {
                        var n = N.get(t)
                        if (n)
                          return n.slice(0, e).every(function (e) {
                            return e
                          })
                      })
                      if (t) return (j = t), 'break'
                    },
                    V = E ? 3 : 1;
                  V > 0 && 'break' !== U(V);
                  V--
                );
              t.placement !== j &&
                ((t.modifiersData[i]._skip = !0),
                (t.placement = j),
                (t.reset = !0))
            }
          },
          requiresIfExists: ['offset'],
          data: { _skip: !1 },
        }
        function be(e, t, n) {
          return (
            void 0 === n && (n = { x: 0, y: 0 }),
            {
              top: e.top - t.height - n.y,
              right: e.right - t.width + n.x,
              bottom: e.bottom - t.height + n.y,
              left: e.left - t.width - n.x,
            }
          )
        }
        function _e(e) {
          return [r, s, o, a].some(function (t) {
            return e[t] >= 0
          })
        }
        const we = {
            name: 'hide',
            enabled: !0,
            phase: 'main',
            requiresIfExists: ['preventOverflow'],
            fn: function (e) {
              var t = e.state,
                n = e.name,
                i = t.rects.reference,
                r = t.rects.popper,
                o = t.modifiersData.preventOverflow,
                s = ve(t, { elementContext: 'reference' }),
                a = ve(t, { altBoundary: !0 }),
                l = be(s, i),
                c = be(a, r, o),
                u = _e(l),
                d = _e(c)
              ;(t.modifiersData[n] = {
                referenceClippingOffsets: l,
                popperEscapeOffsets: c,
                isReferenceHidden: u,
                hasPopperEscaped: d,
              }),
                (t.attributes.popper = Object.assign({}, t.attributes.popper, {
                  'data-popper-reference-hidden': u,
                  'data-popper-escaped': d,
                }))
            },
          },
          xe = {
            name: 'offset',
            enabled: !0,
            phase: 'main',
            requires: ['popperOffsets'],
            fn: function (e) {
              var t = e.state,
                n = e.options,
                i = e.name,
                o = n.offset,
                l = void 0 === o ? [0, 0] : o,
                c = v.reduce(function (e, n) {
                  return (
                    (e[n] = (function (e, t, n) {
                      var i = $(e),
                        o = [a, r].indexOf(i) >= 0 ? -1 : 1,
                        l =
                          'function' == typeof n
                            ? n(Object.assign({}, t, { placement: e }))
                            : n,
                        c = l[0],
                        u = l[1]
                      return (
                        (c = c || 0),
                        (u = (u || 0) * o),
                        [a, s].indexOf(i) >= 0 ? { x: u, y: c } : { x: c, y: u }
                      )
                    })(n, t.rects, l)),
                    e
                  )
                }, {}),
                u = c[t.placement],
                d = u.x,
                f = u.y
              null != t.modifiersData.popperOffsets &&
                ((t.modifiersData.popperOffsets.x += d),
                (t.modifiersData.popperOffsets.y += f)),
                (t.modifiersData[i] = c)
            },
          },
          Ee = {
            name: 'popperOffsets',
            enabled: !0,
            phase: 'read',
            fn: function (e) {
              var t = e.state,
                n = e.name
              t.modifiersData[n] = me({
                reference: t.rects.reference,
                element: t.rects.popper,
                strategy: 'absolute',
                placement: t.placement,
              })
            },
            data: {},
          },
          Te = {
            name: 'preventOverflow',
            enabled: !0,
            phase: 'main',
            fn: function (e) {
              var t = e.state,
                n = e.options,
                i = e.name,
                l = n.mainAxis,
                c = void 0 === l || l,
                d = n.altAxis,
                f = void 0 !== d && d,
                p = n.boundary,
                h = n.rootBoundary,
                g = n.altBoundary,
                m = n.padding,
                v = n.tether,
                y = void 0 === v || v,
                b = n.tetherOffset,
                _ = void 0 === b ? 0 : b,
                w = ve(t, {
                  boundary: p,
                  rootBoundary: h,
                  padding: m,
                  altBoundary: g,
                }),
                x = $(t.placement),
                E = G(t.placement),
                T = !E,
                C = X(x),
                A = 'x' === C ? 'y' : 'x',
                k = t.modifiersData.popperOffsets,
                S = t.rects.reference,
                O = t.rects.popper,
                D =
                  'function' == typeof _
                    ? _(Object.assign({}, t.rects, { placement: t.placement }))
                    : _,
                N =
                  'number' == typeof D
                    ? { mainAxis: D, altAxis: D }
                    : Object.assign({ mainAxis: 0, altAxis: 0 }, D),
                L = t.modifiersData.offset
                  ? t.modifiersData.offset[t.placement]
                  : null,
                j = { x: 0, y: 0 }
              if (k) {
                if (c) {
                  var H,
                    M = 'y' === C ? r : a,
                    R = 'y' === C ? o : s,
                    B = 'y' === C ? 'height' : 'width',
                    W = k[C],
                    F = W + w[M],
                    z = W - w[R],
                    U = y ? -O[B] / 2 : 0,
                    K = E === u ? S[B] : O[B],
                    Q = E === u ? -O[B] : -S[B],
                    J = t.elements.arrow,
                    Z = y && J ? q(J) : { width: 0, height: 0 },
                    ee = t.modifiersData['arrow#persistent']
                      ? t.modifiersData['arrow#persistent'].padding
                      : { top: 0, right: 0, bottom: 0, left: 0 },
                    te = ee[M],
                    ne = ee[R],
                    ie = Y(0, S[B], Z[B]),
                    re = T
                      ? S[B] / 2 - U - ie - te - N.mainAxis
                      : K - ie - te - N.mainAxis,
                    oe = T
                      ? -S[B] / 2 + U + ie + ne + N.mainAxis
                      : Q + ie + ne + N.mainAxis,
                    se = t.elements.arrow && V(t.elements.arrow),
                    ae = se
                      ? 'y' === C
                        ? se.clientTop || 0
                        : se.clientLeft || 0
                      : 0,
                    le = null != (H = null == L ? void 0 : L[C]) ? H : 0,
                    ce = W + oe - le,
                    ue = Y(y ? I(F, W + re - le - ae) : F, W, y ? P(z, ce) : z)
                  ;(k[C] = ue), (j[C] = ue - W)
                }
                if (f) {
                  var de,
                    fe = 'x' === C ? r : a,
                    pe = 'x' === C ? o : s,
                    he = k[A],
                    ge = 'y' === A ? 'height' : 'width',
                    me = he + w[fe],
                    ye = he - w[pe],
                    be = -1 !== [r, a].indexOf(x),
                    _e = null != (de = null == L ? void 0 : L[A]) ? de : 0,
                    we = be ? me : he - S[ge] - O[ge] - _e + N.altAxis,
                    xe = be ? he + S[ge] + O[ge] - _e - N.altAxis : ye,
                    Ee =
                      y && be
                        ? (function (e, t, n) {
                            var i = Y(e, t, n)
                            return i > n ? n : i
                          })(we, he, xe)
                        : Y(y ? we : me, he, y ? xe : ye)
                  ;(k[A] = Ee), (j[A] = Ee - he)
                }
                t.modifiersData[i] = j
              }
            },
            requiresIfExists: ['offset'],
          }
        function Ce(e, t, n) {
          void 0 === n && (n = !1)
          var i,
            r,
            o = N(t),
            s =
              N(t) &&
              (function (e) {
                var t = e.getBoundingClientRect(),
                  n = H(t.width) / e.offsetWidth || 1,
                  i = H(t.height) / e.offsetHeight || 1
                return 1 !== n || 1 !== i
              })(t),
            a = F(t),
            l = M(e, s),
            c = { scrollLeft: 0, scrollTop: 0 },
            u = { x: 0, y: 0 }
          return (
            (o || (!o && !n)) &&
              (('body' !== S(t) || ue(a)) &&
                (c =
                  (i = t) !== O(i) && N(i)
                    ? { scrollLeft: (r = i).scrollLeft, scrollTop: r.scrollTop }
                    : le(i)),
              N(t)
                ? (((u = M(t, !0)).x += t.clientLeft), (u.y += t.clientTop))
                : a && (u.x = ce(a))),
            {
              x: l.left + c.scrollLeft - u.x,
              y: l.top + c.scrollTop - u.y,
              width: l.width,
              height: l.height,
            }
          )
        }
        function Ae(e) {
          var t = new Map(),
            n = new Set(),
            i = []
          function r(e) {
            n.add(e.name),
              []
                .concat(e.requires || [], e.requiresIfExists || [])
                .forEach(function (e) {
                  if (!n.has(e)) {
                    var i = t.get(e)
                    i && r(i)
                  }
                }),
              i.push(e)
          }
          return (
            e.forEach(function (e) {
              t.set(e.name, e)
            }),
            e.forEach(function (e) {
              n.has(e.name) || r(e)
            }),
            i
          )
        }
        var ke = { placement: 'bottom', modifiers: [], strategy: 'absolute' }
        function Se() {
          for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++)
            t[n] = arguments[n]
          return !t.some(function (e) {
            return !(e && 'function' == typeof e.getBoundingClientRect)
          })
        }
        function Oe(e) {
          void 0 === e && (e = {})
          var t = e,
            n = t.defaultModifiers,
            i = void 0 === n ? [] : n,
            r = t.defaultOptions,
            o = void 0 === r ? ke : r
          return function (e, t, n) {
            void 0 === n && (n = o)
            var r,
              s,
              a = {
                placement: 'bottom',
                orderedModifiers: [],
                options: Object.assign({}, ke, o),
                modifiersData: {},
                elements: { reference: e, popper: t },
                attributes: {},
                styles: {},
              },
              l = [],
              c = !1,
              u = {
                state: a,
                setOptions: function (n) {
                  var r = 'function' == typeof n ? n(a.options) : n
                  d(),
                    (a.options = Object.assign({}, o, a.options, r)),
                    (a.scrollParents = {
                      reference: D(e)
                        ? fe(e)
                        : e.contextElement
                        ? fe(e.contextElement)
                        : [],
                      popper: fe(t),
                    })
                  var s = (function (e) {
                    var t = Ae(e)
                    return k.reduce(function (e, n) {
                      return e.concat(
                        t.filter(function (e) {
                          return e.phase === n
                        }),
                      )
                    }, [])
                  })(
                    (function (e) {
                      var t = e.reduce(function (e, t) {
                        var n = e[t.name]
                        return (
                          (e[t.name] = n
                            ? Object.assign({}, n, t, {
                                options: Object.assign(
                                  {},
                                  n.options,
                                  t.options,
                                ),
                                data: Object.assign({}, n.data, t.data),
                              })
                            : t),
                          e
                        )
                      }, {})
                      return Object.keys(t).map(function (e) {
                        return t[e]
                      })
                    })([].concat(i, a.options.modifiers)),
                  )
                  return (
                    (a.orderedModifiers = s.filter(function (e) {
                      return e.enabled
                    })),
                    a.orderedModifiers.forEach(function (e) {
                      var t = e.name,
                        n = e.options,
                        i = void 0 === n ? {} : n,
                        r = e.effect
                      if ('function' == typeof r) {
                        var o = r({
                          state: a,
                          name: t,
                          instance: u,
                          options: i,
                        })
                        l.push(o || function () {})
                      }
                    }),
                    u.update()
                  )
                },
                forceUpdate: function () {
                  if (!c) {
                    var e = a.elements,
                      t = e.reference,
                      n = e.popper
                    if (Se(t, n)) {
                      ;(a.rects = {
                        reference: Ce(t, V(n), 'fixed' === a.options.strategy),
                        popper: q(n),
                      }),
                        (a.reset = !1),
                        (a.placement = a.options.placement),
                        a.orderedModifiers.forEach(function (e) {
                          return (a.modifiersData[e.name] = Object.assign(
                            {},
                            e.data,
                          ))
                        })
                      for (var i = 0; i < a.orderedModifiers.length; i++)
                        if (!0 !== a.reset) {
                          var r = a.orderedModifiers[i],
                            o = r.fn,
                            s = r.options,
                            l = void 0 === s ? {} : s,
                            d = r.name
                          'function' == typeof o &&
                            (a =
                              o({
                                state: a,
                                options: l,
                                name: d,
                                instance: u,
                              }) || a)
                        } else (a.reset = !1), (i = -1)
                    }
                  }
                },
                update:
                  ((r = function () {
                    return new Promise(function (e) {
                      u.forceUpdate(), e(a)
                    })
                  }),
                  function () {
                    return (
                      s ||
                        (s = new Promise(function (e) {
                          Promise.resolve().then(function () {
                            ;(s = void 0), e(r())
                          })
                        })),
                      s
                    )
                  }),
                destroy: function () {
                  d(), (c = !0)
                },
              }
            if (!Se(e, t)) return u
            function d() {
              l.forEach(function (e) {
                return e()
              }),
                (l = [])
            }
            return (
              u.setOptions(n).then(function (e) {
                !c && n.onFirstUpdate && n.onFirstUpdate(e)
              }),
              u
            )
          }
        }
        var De = Oe(),
          Ne = Oe({ defaultModifiers: [ie, Ee, te, j, xe, ye, Te, J, we] }),
          Le = Oe({ defaultModifiers: [ie, Ee, te, j] })
        /*!
         * Bootstrap v5.1.3 (https://getbootstrap.com/)
         * Copyright 2011-2021 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
         * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
         */ const je = 'transitionend',
          $e = (e) => {
            let t = e.getAttribute('data-bs-target')
            if (!t || '#' === t) {
              let n = e.getAttribute('href')
              if (!n || (!n.includes('#') && !n.startsWith('.'))) return null
              n.includes('#') &&
                !n.startsWith('#') &&
                (n = `#${n.split('#')[1]}`),
                (t = n && '#' !== n ? n.trim() : null)
            }
            return t
          },
          Pe = (e) => {
            const t = $e(e)
            return t && document.querySelector(t) ? t : null
          },
          Ie = (e) => {
            const t = $e(e)
            return t ? document.querySelector(t) : null
          },
          He = (e) => {
            e.dispatchEvent(new Event(je))
          },
          Me = (e) =>
            !(!e || 'object' != typeof e) &&
            (void 0 !== e.jquery && (e = e[0]), void 0 !== e.nodeType),
          qe = (e) =>
            Me(e)
              ? e.jquery
                ? e[0]
                : e
              : 'string' == typeof e && e.length > 0
              ? document.querySelector(e)
              : null,
          Re = (e, t, n) => {
            Object.keys(n).forEach((i) => {
              const r = n[i],
                o = t[i],
                s =
                  o && Me(o)
                    ? 'element'
                    : null == (a = o)
                    ? `${a}`
                    : {}.toString
                        .call(a)
                        .match(/\s([a-z]+)/i)[1]
                        .toLowerCase()
              var a
              if (!new RegExp(r).test(s))
                throw new TypeError(
                  `${e.toUpperCase()}: Option "${i}" provided type "${s}" but expected type "${r}".`,
                )
            })
          },
          Be = (e) =>
            !(!Me(e) || 0 === e.getClientRects().length) &&
            'visible' === getComputedStyle(e).getPropertyValue('visibility'),
          We = (e) =>
            !e ||
            e.nodeType !== Node.ELEMENT_NODE ||
            !!e.classList.contains('disabled') ||
            (void 0 !== e.disabled
              ? e.disabled
              : e.hasAttribute('disabled') &&
                'false' !== e.getAttribute('disabled')),
          Fe = (e) => {
            if (!document.documentElement.attachShadow) return null
            if ('function' == typeof e.getRootNode) {
              const t = e.getRootNode()
              return t instanceof ShadowRoot ? t : null
            }
            return e instanceof ShadowRoot
              ? e
              : e.parentNode
              ? Fe(e.parentNode)
              : null
          },
          ze = () => {},
          Ue = (e) => {
            e.offsetHeight
          },
          Ve = () => {
            const { jQuery: e } = window
            return e && !document.body.hasAttribute('data-bs-no-jquery')
              ? e
              : null
          },
          Xe = [],
          Ye = () => 'rtl' === document.documentElement.dir,
          Ke = (e) => {
            var t
            ;(t = () => {
              const t = Ve()
              if (t) {
                const n = e.NAME,
                  i = t.fn[n]
                ;(t.fn[n] = e.jQueryInterface),
                  (t.fn[n].Constructor = e),
                  (t.fn[n].noConflict = () => (
                    (t.fn[n] = i), e.jQueryInterface
                  ))
              }
            }),
              'loading' === document.readyState
                ? (Xe.length ||
                    document.addEventListener('DOMContentLoaded', () => {
                      Xe.forEach((e) => e())
                    }),
                  Xe.push(t))
                : t()
          },
          Qe = (e) => {
            'function' == typeof e && e()
          },
          Je = (e, t, n = !0) => {
            if (!n) return void Qe(e)
            const i =
              ((e) => {
                if (!e) return 0
                let {
                  transitionDuration: t,
                  transitionDelay: n,
                } = window.getComputedStyle(e)
                const i = Number.parseFloat(t),
                  r = Number.parseFloat(n)
                return i || r
                  ? ((t = t.split(',')[0]),
                    (n = n.split(',')[0]),
                    1e3 * (Number.parseFloat(t) + Number.parseFloat(n)))
                  : 0
              })(t) + 5
            let r = !1
            const o = ({ target: n }) => {
              n === t && ((r = !0), t.removeEventListener(je, o), Qe(e))
            }
            t.addEventListener(je, o),
              setTimeout(() => {
                r || He(t)
              }, i)
          },
          Ge = (e, t, n, i) => {
            let r = e.indexOf(t)
            if (-1 === r) return e[!n && i ? e.length - 1 : 0]
            const o = e.length
            return (
              (r += n ? 1 : -1),
              i && (r = (r + o) % o),
              e[Math.max(0, Math.min(r, o - 1))]
            )
          },
          Ze = /[^.]*(?=\..*)\.|.*/,
          et = /\..*/,
          tt = /::\d+$/,
          nt = {}
        let it = 1
        const rt = { mouseenter: 'mouseover', mouseleave: 'mouseout' },
          ot = /^(mouseenter|mouseleave)/i,
          st = new Set([
            'click',
            'dblclick',
            'mouseup',
            'mousedown',
            'contextmenu',
            'mousewheel',
            'DOMMouseScroll',
            'mouseover',
            'mouseout',
            'mousemove',
            'selectstart',
            'selectend',
            'keydown',
            'keypress',
            'keyup',
            'orientationchange',
            'touchstart',
            'touchmove',
            'touchend',
            'touchcancel',
            'pointerdown',
            'pointermove',
            'pointerup',
            'pointerleave',
            'pointercancel',
            'gesturestart',
            'gesturechange',
            'gestureend',
            'focus',
            'blur',
            'change',
            'reset',
            'select',
            'submit',
            'focusin',
            'focusout',
            'load',
            'unload',
            'beforeunload',
            'resize',
            'move',
            'DOMContentLoaded',
            'readystatechange',
            'error',
            'abort',
            'scroll',
          ])
        function at(e, t) {
          return (t && `${t}::${it++}`) || e.uidEvent || it++
        }
        function lt(e) {
          const t = at(e)
          return (e.uidEvent = t), (nt[t] = nt[t] || {}), nt[t]
        }
        function ct(e, t, n = null) {
          const i = Object.keys(e)
          for (let r = 0, o = i.length; r < o; r++) {
            const o = e[i[r]]
            if (o.originalHandler === t && o.delegationSelector === n) return o
          }
          return null
        }
        function ut(e, t, n) {
          const i = 'string' == typeof t,
            r = i ? n : t
          let o = pt(e)
          return st.has(o) || (o = e), [i, r, o]
        }
        function dt(e, t, n, i, r) {
          if ('string' != typeof t || !e) return
          if ((n || ((n = i), (i = null)), ot.test(t))) {
            const e = (e) =>
              function (t) {
                if (
                  !t.relatedTarget ||
                  (t.relatedTarget !== t.delegateTarget &&
                    !t.delegateTarget.contains(t.relatedTarget))
                )
                  return e.call(this, t)
              }
            i ? (i = e(i)) : (n = e(n))
          }
          const [o, s, a] = ut(t, n, i),
            l = lt(e),
            c = l[a] || (l[a] = {}),
            u = ct(c, s, o ? n : null)
          if (u) return void (u.oneOff = u.oneOff && r)
          const d = at(s, t.replace(Ze, '')),
            f = o
              ? (function (e, t, n) {
                  return function i(r) {
                    const o = e.querySelectorAll(t)
                    for (
                      let { target: s } = r;
                      s && s !== this;
                      s = s.parentNode
                    )
                      for (let a = o.length; a--; )
                        if (o[a] === s)
                          return (
                            (r.delegateTarget = s),
                            i.oneOff && ht.off(e, r.type, t, n),
                            n.apply(s, [r])
                          )
                    return null
                  }
                })(e, n, i)
              : (function (e, t) {
                  return function n(i) {
                    return (
                      (i.delegateTarget = e),
                      n.oneOff && ht.off(e, i.type, t),
                      t.apply(e, [i])
                    )
                  }
                })(e, n)
          ;(f.delegationSelector = o ? n : null),
            (f.originalHandler = s),
            (f.oneOff = r),
            (f.uidEvent = d),
            (c[d] = f),
            e.addEventListener(a, f, o)
        }
        function ft(e, t, n, i, r) {
          const o = ct(t[n], i, r)
          o &&
            (e.removeEventListener(n, o, Boolean(r)), delete t[n][o.uidEvent])
        }
        function pt(e) {
          return (e = e.replace(et, '')), rt[e] || e
        }
        const ht = {
            on(e, t, n, i) {
              dt(e, t, n, i, !1)
            },
            one(e, t, n, i) {
              dt(e, t, n, i, !0)
            },
            off(e, t, n, i) {
              if ('string' != typeof t || !e) return
              const [r, o, s] = ut(t, n, i),
                a = s !== t,
                l = lt(e),
                c = t.startsWith('.')
              if (void 0 !== o) {
                if (!l || !l[s]) return
                return void ft(e, l, s, o, r ? n : null)
              }
              c &&
                Object.keys(l).forEach((n) => {
                  !(function (e, t, n, i) {
                    const r = t[n] || {}
                    Object.keys(r).forEach((o) => {
                      if (o.includes(i)) {
                        const i = r[o]
                        ft(e, t, n, i.originalHandler, i.delegationSelector)
                      }
                    })
                  })(e, l, n, t.slice(1))
                })
              const u = l[s] || {}
              Object.keys(u).forEach((n) => {
                const i = n.replace(tt, '')
                if (!a || t.includes(i)) {
                  const t = u[n]
                  ft(e, l, s, t.originalHandler, t.delegationSelector)
                }
              })
            },
            trigger(e, t, n) {
              if ('string' != typeof t || !e) return null
              const i = Ve(),
                r = pt(t),
                o = t !== r,
                s = st.has(r)
              let a,
                l = !0,
                c = !0,
                u = !1,
                d = null
              return (
                o &&
                  i &&
                  ((a = i.Event(t, n)),
                  i(e).trigger(a),
                  (l = !a.isPropagationStopped()),
                  (c = !a.isImmediatePropagationStopped()),
                  (u = a.isDefaultPrevented())),
                s
                  ? ((d = document.createEvent('HTMLEvents')),
                    d.initEvent(r, l, !0))
                  : (d = new CustomEvent(t, { bubbles: l, cancelable: !0 })),
                void 0 !== n &&
                  Object.keys(n).forEach((e) => {
                    Object.defineProperty(d, e, { get: () => n[e] })
                  }),
                u && d.preventDefault(),
                c && e.dispatchEvent(d),
                d.defaultPrevented && void 0 !== a && a.preventDefault(),
                d
              )
            },
          },
          gt = new Map(),
          mt = {
            set(e, t, n) {
              gt.has(e) || gt.set(e, new Map())
              const i = gt.get(e)
              i.has(t) || 0 === i.size
                ? i.set(t, n)
                : console.error(
                    `Bootstrap doesn't allow more than one instance per element. Bound instance: ${
                      Array.from(i.keys())[0]
                    }.`,
                  )
            },
            get: (e, t) => (gt.has(e) && gt.get(e).get(t)) || null,
            remove(e, t) {
              if (!gt.has(e)) return
              const n = gt.get(e)
              n.delete(t), 0 === n.size && gt.delete(e)
            },
          }
        class vt {
          constructor(e) {
            ;(e = qe(e)) &&
              ((this._element = e),
              mt.set(this._element, this.constructor.DATA_KEY, this))
          }
          dispose() {
            mt.remove(this._element, this.constructor.DATA_KEY),
              ht.off(this._element, this.constructor.EVENT_KEY),
              Object.getOwnPropertyNames(this).forEach((e) => {
                this[e] = null
              })
          }
          _queueCallback(e, t, n = !0) {
            Je(e, t, n)
          }
          static getInstance(e) {
            return mt.get(qe(e), this.DATA_KEY)
          }
          static getOrCreateInstance(e, t = {}) {
            return (
              this.getInstance(e) ||
              new this(e, 'object' == typeof t ? t : null)
            )
          }
          static get VERSION() {
            return '5.1.3'
          }
          static get NAME() {
            throw new Error(
              'You have to implement the static method "NAME", for each component!',
            )
          }
          static get DATA_KEY() {
            return `bs.${this.NAME}`
          }
          static get EVENT_KEY() {
            return `.${this.DATA_KEY}`
          }
        }
        const yt = (e, t = 'hide') => {
          const n = `click.dismiss${e.EVENT_KEY}`,
            i = e.NAME
          ht.on(document, n, `[data-bs-dismiss="${i}"]`, function (n) {
            if (
              (['A', 'AREA'].includes(this.tagName) && n.preventDefault(),
              We(this))
            )
              return
            const r = Ie(this) || this.closest(`.${i}`)
            e.getOrCreateInstance(r)[t]()
          })
        }
        class bt extends vt {
          static get NAME() {
            return 'alert'
          }
          close() {
            if (ht.trigger(this._element, 'close.bs.alert').defaultPrevented)
              return
            this._element.classList.remove('show')
            const e = this._element.classList.contains('fade')
            this._queueCallback(() => this._destroyElement(), this._element, e)
          }
          _destroyElement() {
            this._element.remove(),
              ht.trigger(this._element, 'closed.bs.alert'),
              this.dispose()
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = bt.getOrCreateInstance(this)
              if ('string' == typeof e) {
                if (void 0 === t[e] || e.startsWith('_') || 'constructor' === e)
                  throw new TypeError(`No method named "${e}"`)
                t[e](this)
              }
            })
          }
        }
        yt(bt, 'close'), Ke(bt)
        const _t = '[data-bs-toggle="button"]'
        class wt extends vt {
          static get NAME() {
            return 'button'
          }
          toggle() {
            this._element.setAttribute(
              'aria-pressed',
              this._element.classList.toggle('active'),
            )
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = wt.getOrCreateInstance(this)
              'toggle' === e && t[e]()
            })
          }
        }
        function xt(e) {
          return (
            'true' === e ||
            ('false' !== e &&
              (e === Number(e).toString()
                ? Number(e)
                : '' === e || 'null' === e
                ? null
                : e))
          )
        }
        function Et(e) {
          return e.replace(/[A-Z]/g, (e) => `-${e.toLowerCase()}`)
        }
        ht.on(document, 'click.bs.button.data-api', _t, (e) => {
          e.preventDefault()
          const t = e.target.closest(_t)
          wt.getOrCreateInstance(t).toggle()
        }),
          Ke(wt)
        const Tt = {
            setDataAttribute(e, t, n) {
              e.setAttribute(`data-bs-${Et(t)}`, n)
            },
            removeDataAttribute(e, t) {
              e.removeAttribute(`data-bs-${Et(t)}`)
            },
            getDataAttributes(e) {
              if (!e) return {}
              const t = {}
              return (
                Object.keys(e.dataset)
                  .filter((e) => e.startsWith('bs'))
                  .forEach((n) => {
                    let i = n.replace(/^bs/, '')
                    ;(i = i.charAt(0).toLowerCase() + i.slice(1, i.length)),
                      (t[i] = xt(e.dataset[n]))
                  }),
                t
              )
            },
            getDataAttribute: (e, t) => xt(e.getAttribute(`data-bs-${Et(t)}`)),
            offset(e) {
              const t = e.getBoundingClientRect()
              return {
                top: t.top + window.pageYOffset,
                left: t.left + window.pageXOffset,
              }
            },
            position: (e) => ({ top: e.offsetTop, left: e.offsetLeft }),
          },
          Ct = {
            find: (e, t = document.documentElement) =>
              [].concat(...Element.prototype.querySelectorAll.call(t, e)),
            findOne: (e, t = document.documentElement) =>
              Element.prototype.querySelector.call(t, e),
            children: (e, t) =>
              [].concat(...e.children).filter((e) => e.matches(t)),
            parents(e, t) {
              const n = []
              let i = e.parentNode
              for (
                ;
                i && i.nodeType === Node.ELEMENT_NODE && 3 !== i.nodeType;

              )
                i.matches(t) && n.push(i), (i = i.parentNode)
              return n
            },
            prev(e, t) {
              let n = e.previousElementSibling
              for (; n; ) {
                if (n.matches(t)) return [n]
                n = n.previousElementSibling
              }
              return []
            },
            next(e, t) {
              let n = e.nextElementSibling
              for (; n; ) {
                if (n.matches(t)) return [n]
                n = n.nextElementSibling
              }
              return []
            },
            focusableChildren(e) {
              const t = [
                'a',
                'button',
                'input',
                'textarea',
                'select',
                'details',
                '[tabindex]',
                '[contenteditable="true"]',
              ]
                .map((e) => `${e}:not([tabindex^="-"])`)
                .join(', ')
              return this.find(t, e).filter((e) => !We(e) && Be(e))
            },
          },
          At = 'carousel',
          kt = {
            interval: 5e3,
            keyboard: !0,
            slide: !1,
            pause: 'hover',
            wrap: !0,
            touch: !0,
          },
          St = {
            interval: '(number|boolean)',
            keyboard: 'boolean',
            slide: '(boolean|string)',
            pause: '(string|boolean)',
            wrap: 'boolean',
            touch: 'boolean',
          },
          Ot = 'next',
          Dt = 'prev',
          Nt = 'left',
          Lt = 'right',
          jt = { ArrowLeft: Lt, ArrowRight: Nt },
          $t = 'slid.bs.carousel',
          Pt = 'active',
          It = '.active.carousel-item'
        class Ht extends vt {
          constructor(e, t) {
            super(e),
              (this._items = null),
              (this._interval = null),
              (this._activeElement = null),
              (this._isPaused = !1),
              (this._isSliding = !1),
              (this.touchTimeout = null),
              (this.touchStartX = 0),
              (this.touchDeltaX = 0),
              (this._config = this._getConfig(t)),
              (this._indicatorsElement = Ct.findOne(
                '.carousel-indicators',
                this._element,
              )),
              (this._touchSupported =
                'ontouchstart' in document.documentElement ||
                navigator.maxTouchPoints > 0),
              (this._pointerEvent = Boolean(window.PointerEvent)),
              this._addEventListeners()
          }
          static get Default() {
            return kt
          }
          static get NAME() {
            return At
          }
          next() {
            this._slide(Ot)
          }
          nextWhenVisible() {
            !document.hidden && Be(this._element) && this.next()
          }
          prev() {
            this._slide(Dt)
          }
          pause(e) {
            e || (this._isPaused = !0),
              Ct.findOne(
                '.carousel-item-next, .carousel-item-prev',
                this._element,
              ) && (He(this._element), this.cycle(!0)),
              clearInterval(this._interval),
              (this._interval = null)
          }
          cycle(e) {
            e || (this._isPaused = !1),
              this._interval &&
                (clearInterval(this._interval), (this._interval = null)),
              this._config &&
                this._config.interval &&
                !this._isPaused &&
                (this._updateInterval(),
                (this._interval = setInterval(
                  (document.visibilityState
                    ? this.nextWhenVisible
                    : this.next
                  ).bind(this),
                  this._config.interval,
                )))
          }
          to(e) {
            this._activeElement = Ct.findOne(It, this._element)
            const t = this._getItemIndex(this._activeElement)
            if (e > this._items.length - 1 || e < 0) return
            if (this._isSliding)
              return void ht.one(this._element, $t, () => this.to(e))
            if (t === e) return this.pause(), void this.cycle()
            const n = e > t ? Ot : Dt
            this._slide(n, this._items[e])
          }
          _getConfig(e) {
            return (
              (e = {
                ...kt,
                ...Tt.getDataAttributes(this._element),
                ...('object' == typeof e ? e : {}),
              }),
              Re(At, e, St),
              e
            )
          }
          _handleSwipe() {
            const e = Math.abs(this.touchDeltaX)
            if (e <= 40) return
            const t = e / this.touchDeltaX
            ;(this.touchDeltaX = 0), t && this._slide(t > 0 ? Lt : Nt)
          }
          _addEventListeners() {
            this._config.keyboard &&
              ht.on(this._element, 'keydown.bs.carousel', (e) =>
                this._keydown(e),
              ),
              'hover' === this._config.pause &&
                (ht.on(this._element, 'mouseenter.bs.carousel', (e) =>
                  this.pause(e),
                ),
                ht.on(this._element, 'mouseleave.bs.carousel', (e) =>
                  this.cycle(e),
                )),
              this._config.touch &&
                this._touchSupported &&
                this._addTouchEventListeners()
          }
          _addTouchEventListeners() {
            const e = (e) =>
                this._pointerEvent &&
                ('pen' === e.pointerType || 'touch' === e.pointerType),
              t = (t) => {
                e(t)
                  ? (this.touchStartX = t.clientX)
                  : this._pointerEvent ||
                    (this.touchStartX = t.touches[0].clientX)
              },
              n = (e) => {
                this.touchDeltaX =
                  e.touches && e.touches.length > 1
                    ? 0
                    : e.touches[0].clientX - this.touchStartX
              },
              i = (t) => {
                e(t) && (this.touchDeltaX = t.clientX - this.touchStartX),
                  this._handleSwipe(),
                  'hover' === this._config.pause &&
                    (this.pause(),
                    this.touchTimeout && clearTimeout(this.touchTimeout),
                    (this.touchTimeout = setTimeout(
                      (e) => this.cycle(e),
                      500 + this._config.interval,
                    )))
              }
            Ct.find('.carousel-item img', this._element).forEach((e) => {
              ht.on(e, 'dragstart.bs.carousel', (e) => e.preventDefault())
            }),
              this._pointerEvent
                ? (ht.on(this._element, 'pointerdown.bs.carousel', (e) => t(e)),
                  ht.on(this._element, 'pointerup.bs.carousel', (e) => i(e)),
                  this._element.classList.add('pointer-event'))
                : (ht.on(this._element, 'touchstart.bs.carousel', (e) => t(e)),
                  ht.on(this._element, 'touchmove.bs.carousel', (e) => n(e)),
                  ht.on(this._element, 'touchend.bs.carousel', (e) => i(e)))
          }
          _keydown(e) {
            if (/input|textarea/i.test(e.target.tagName)) return
            const t = jt[e.key]
            t && (e.preventDefault(), this._slide(t))
          }
          _getItemIndex(e) {
            return (
              (this._items =
                e && e.parentNode
                  ? Ct.find('.carousel-item', e.parentNode)
                  : []),
              this._items.indexOf(e)
            )
          }
          _getItemByOrder(e, t) {
            const n = e === Ot
            return Ge(this._items, t, n, this._config.wrap)
          }
          _triggerSlideEvent(e, t) {
            const n = this._getItemIndex(e),
              i = this._getItemIndex(Ct.findOne(It, this._element))
            return ht.trigger(this._element, 'slide.bs.carousel', {
              relatedTarget: e,
              direction: t,
              from: i,
              to: n,
            })
          }
          _setActiveIndicatorElement(e) {
            if (this._indicatorsElement) {
              const t = Ct.findOne('.active', this._indicatorsElement)
              t.classList.remove(Pt), t.removeAttribute('aria-current')
              const n = Ct.find('[data-bs-target]', this._indicatorsElement)
              for (let t = 0; t < n.length; t++)
                if (
                  Number.parseInt(n[t].getAttribute('data-bs-slide-to'), 10) ===
                  this._getItemIndex(e)
                ) {
                  n[t].classList.add(Pt),
                    n[t].setAttribute('aria-current', 'true')
                  break
                }
            }
          }
          _updateInterval() {
            const e = this._activeElement || Ct.findOne(It, this._element)
            if (!e) return
            const t = Number.parseInt(e.getAttribute('data-bs-interval'), 10)
            t
              ? ((this._config.defaultInterval =
                  this._config.defaultInterval || this._config.interval),
                (this._config.interval = t))
              : (this._config.interval =
                  this._config.defaultInterval || this._config.interval)
          }
          _slide(e, t) {
            const n = this._directionToOrder(e),
              i = Ct.findOne(It, this._element),
              r = this._getItemIndex(i),
              o = t || this._getItemByOrder(n, i),
              s = this._getItemIndex(o),
              a = Boolean(this._interval),
              l = n === Ot,
              c = l ? 'carousel-item-start' : 'carousel-item-end',
              u = l ? 'carousel-item-next' : 'carousel-item-prev',
              d = this._orderToDirection(n)
            if (o && o.classList.contains(Pt))
              return void (this._isSliding = !1)
            if (this._isSliding) return
            if (this._triggerSlideEvent(o, d).defaultPrevented) return
            if (!i || !o) return
            ;(this._isSliding = !0),
              a && this.pause(),
              this._setActiveIndicatorElement(o),
              (this._activeElement = o)
            const f = () => {
              ht.trigger(this._element, $t, {
                relatedTarget: o,
                direction: d,
                from: r,
                to: s,
              })
            }
            if (this._element.classList.contains('slide')) {
              o.classList.add(u), Ue(o), i.classList.add(c), o.classList.add(c)
              const e = () => {
                o.classList.remove(c, u),
                  o.classList.add(Pt),
                  i.classList.remove(Pt, u, c),
                  (this._isSliding = !1),
                  setTimeout(f, 0)
              }
              this._queueCallback(e, i, !0)
            } else
              i.classList.remove(Pt),
                o.classList.add(Pt),
                (this._isSliding = !1),
                f()
            a && this.cycle()
          }
          _directionToOrder(e) {
            return [Lt, Nt].includes(e)
              ? Ye()
                ? e === Nt
                  ? Dt
                  : Ot
                : e === Nt
                ? Ot
                : Dt
              : e
          }
          _orderToDirection(e) {
            return [Ot, Dt].includes(e)
              ? Ye()
                ? e === Dt
                  ? Nt
                  : Lt
                : e === Dt
                ? Lt
                : Nt
              : e
          }
          static carouselInterface(e, t) {
            const n = Ht.getOrCreateInstance(e, t)
            let { _config: i } = n
            'object' == typeof t && (i = { ...i, ...t })
            const r = 'string' == typeof t ? t : i.slide
            if ('number' == typeof t) n.to(t)
            else if ('string' == typeof r) {
              if (void 0 === n[r]) throw new TypeError(`No method named "${r}"`)
              n[r]()
            } else i.interval && i.ride && (n.pause(), n.cycle())
          }
          static jQueryInterface(e) {
            return this.each(function () {
              Ht.carouselInterface(this, e)
            })
          }
          static dataApiClickHandler(e) {
            const t = Ie(this)
            if (!t || !t.classList.contains('carousel')) return
            const n = {
                ...Tt.getDataAttributes(t),
                ...Tt.getDataAttributes(this),
              },
              i = this.getAttribute('data-bs-slide-to')
            i && (n.interval = !1),
              Ht.carouselInterface(t, n),
              i && Ht.getInstance(t).to(i),
              e.preventDefault()
          }
        }
        ht.on(
          document,
          'click.bs.carousel.data-api',
          '[data-bs-slide], [data-bs-slide-to]',
          Ht.dataApiClickHandler,
        ),
          ht.on(window, 'load.bs.carousel.data-api', () => {
            const e = Ct.find('[data-bs-ride="carousel"]')
            for (let t = 0, n = e.length; t < n; t++)
              Ht.carouselInterface(e[t], Ht.getInstance(e[t]))
          }),
          Ke(Ht)
        const Mt = 'collapse',
          qt = { toggle: !0, parent: null },
          Rt = { toggle: 'boolean', parent: '(null|element)' },
          Bt = 'show',
          Wt = 'collapse',
          Ft = 'collapsing',
          zt = 'collapsed',
          Ut = ':scope .collapse .collapse',
          Vt = '[data-bs-toggle="collapse"]'
        class Xt extends vt {
          constructor(e, t) {
            super(e),
              (this._isTransitioning = !1),
              (this._config = this._getConfig(t)),
              (this._triggerArray = [])
            const n = Ct.find(Vt)
            for (let e = 0, t = n.length; e < t; e++) {
              const t = n[e],
                i = Pe(t),
                r = Ct.find(i).filter((e) => e === this._element)
              null !== i &&
                r.length &&
                ((this._selector = i), this._triggerArray.push(t))
            }
            this._initializeChildren(),
              this._config.parent ||
                this._addAriaAndCollapsedClass(
                  this._triggerArray,
                  this._isShown(),
                ),
              this._config.toggle && this.toggle()
          }
          static get Default() {
            return qt
          }
          static get NAME() {
            return Mt
          }
          toggle() {
            this._isShown() ? this.hide() : this.show()
          }
          show() {
            if (this._isTransitioning || this._isShown()) return
            let e,
              t = []
            if (this._config.parent) {
              const e = Ct.find(Ut, this._config.parent)
              t = Ct.find(
                '.collapse.show, .collapse.collapsing',
                this._config.parent,
              ).filter((t) => !e.includes(t))
            }
            const n = Ct.findOne(this._selector)
            if (t.length) {
              const i = t.find((e) => n !== e)
              if (((e = i ? Xt.getInstance(i) : null), e && e._isTransitioning))
                return
            }
            if (ht.trigger(this._element, 'show.bs.collapse').defaultPrevented)
              return
            t.forEach((t) => {
              n !== t && Xt.getOrCreateInstance(t, { toggle: !1 }).hide(),
                e || mt.set(t, 'bs.collapse', null)
            })
            const i = this._getDimension()
            this._element.classList.remove(Wt),
              this._element.classList.add(Ft),
              (this._element.style[i] = 0),
              this._addAriaAndCollapsedClass(this._triggerArray, !0),
              (this._isTransitioning = !0)
            const r = `scroll${i[0].toUpperCase() + i.slice(1)}`
            this._queueCallback(
              () => {
                ;(this._isTransitioning = !1),
                  this._element.classList.remove(Ft),
                  this._element.classList.add(Wt, Bt),
                  (this._element.style[i] = ''),
                  ht.trigger(this._element, 'shown.bs.collapse')
              },
              this._element,
              !0,
            ),
              (this._element.style[i] = `${this._element[r]}px`)
          }
          hide() {
            if (this._isTransitioning || !this._isShown()) return
            if (ht.trigger(this._element, 'hide.bs.collapse').defaultPrevented)
              return
            const e = this._getDimension()
            ;(this._element.style[e] = `${
              this._element.getBoundingClientRect()[e]
            }px`),
              Ue(this._element),
              this._element.classList.add(Ft),
              this._element.classList.remove(Wt, Bt)
            const t = this._triggerArray.length
            for (let e = 0; e < t; e++) {
              const t = this._triggerArray[e],
                n = Ie(t)
              n && !this._isShown(n) && this._addAriaAndCollapsedClass([t], !1)
            }
            ;(this._isTransitioning = !0),
              (this._element.style[e] = ''),
              this._queueCallback(
                () => {
                  ;(this._isTransitioning = !1),
                    this._element.classList.remove(Ft),
                    this._element.classList.add(Wt),
                    ht.trigger(this._element, 'hidden.bs.collapse')
                },
                this._element,
                !0,
              )
          }
          _isShown(e = this._element) {
            return e.classList.contains(Bt)
          }
          _getConfig(e) {
            return (
              ((e = {
                ...qt,
                ...Tt.getDataAttributes(this._element),
                ...e,
              }).toggle = Boolean(e.toggle)),
              (e.parent = qe(e.parent)),
              Re(Mt, e, Rt),
              e
            )
          }
          _getDimension() {
            return this._element.classList.contains('collapse-horizontal')
              ? 'width'
              : 'height'
          }
          _initializeChildren() {
            if (!this._config.parent) return
            const e = Ct.find(Ut, this._config.parent)
            Ct.find(Vt, this._config.parent)
              .filter((t) => !e.includes(t))
              .forEach((e) => {
                const t = Ie(e)
                t && this._addAriaAndCollapsedClass([e], this._isShown(t))
              })
          }
          _addAriaAndCollapsedClass(e, t) {
            e.length &&
              e.forEach((e) => {
                t ? e.classList.remove(zt) : e.classList.add(zt),
                  e.setAttribute('aria-expanded', t)
              })
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = {}
              'string' == typeof e && /show|hide/.test(e) && (t.toggle = !1)
              const n = Xt.getOrCreateInstance(this, t)
              if ('string' == typeof e) {
                if (void 0 === n[e])
                  throw new TypeError(`No method named "${e}"`)
                n[e]()
              }
            })
          }
        }
        ht.on(document, 'click.bs.collapse.data-api', Vt, function (e) {
          ;('A' === e.target.tagName ||
            (e.delegateTarget && 'A' === e.delegateTarget.tagName)) &&
            e.preventDefault()
          const t = Pe(this)
          Ct.find(t).forEach((e) => {
            Xt.getOrCreateInstance(e, { toggle: !1 }).toggle()
          })
        }),
          Ke(Xt)
        const Yt = 'dropdown',
          Kt = 'Escape',
          Qt = 'Space',
          Jt = 'ArrowUp',
          Gt = 'ArrowDown',
          Zt = new RegExp('ArrowUp|ArrowDown|Escape'),
          en = 'click.bs.dropdown.data-api',
          tn = 'keydown.bs.dropdown.data-api',
          nn = 'show',
          rn = '[data-bs-toggle="dropdown"]',
          on = '.dropdown-menu',
          sn = Ye() ? 'top-end' : 'top-start',
          an = Ye() ? 'top-start' : 'top-end',
          ln = Ye() ? 'bottom-end' : 'bottom-start',
          cn = Ye() ? 'bottom-start' : 'bottom-end',
          un = Ye() ? 'left-start' : 'right-start',
          dn = Ye() ? 'right-start' : 'left-start',
          fn = {
            offset: [0, 2],
            boundary: 'clippingParents',
            reference: 'toggle',
            display: 'dynamic',
            popperConfig: null,
            autoClose: !0,
          },
          pn = {
            offset: '(array|string|function)',
            boundary: '(string|element)',
            reference: '(string|element|object)',
            display: 'string',
            popperConfig: '(null|object|function)',
            autoClose: '(boolean|string)',
          }
        class hn extends vt {
          constructor(e, t) {
            super(e),
              (this._popper = null),
              (this._config = this._getConfig(t)),
              (this._menu = this._getMenuElement()),
              (this._inNavbar = this._detectNavbar())
          }
          static get Default() {
            return fn
          }
          static get DefaultType() {
            return pn
          }
          static get NAME() {
            return Yt
          }
          toggle() {
            return this._isShown() ? this.hide() : this.show()
          }
          show() {
            if (We(this._element) || this._isShown(this._menu)) return
            const e = { relatedTarget: this._element }
            if (
              ht.trigger(this._element, 'show.bs.dropdown', e).defaultPrevented
            )
              return
            const t = hn.getParentFromElement(this._element)
            this._inNavbar
              ? Tt.setDataAttribute(this._menu, 'popper', 'none')
              : this._createPopper(t),
              'ontouchstart' in document.documentElement &&
                !t.closest('.navbar-nav') &&
                []
                  .concat(...document.body.children)
                  .forEach((e) => ht.on(e, 'mouseover', ze)),
              this._element.focus(),
              this._element.setAttribute('aria-expanded', !0),
              this._menu.classList.add(nn),
              this._element.classList.add(nn),
              ht.trigger(this._element, 'shown.bs.dropdown', e)
          }
          hide() {
            if (We(this._element) || !this._isShown(this._menu)) return
            const e = { relatedTarget: this._element }
            this._completeHide(e)
          }
          dispose() {
            this._popper && this._popper.destroy(), super.dispose()
          }
          update() {
            ;(this._inNavbar = this._detectNavbar()),
              this._popper && this._popper.update()
          }
          _completeHide(e) {
            ht.trigger(this._element, 'hide.bs.dropdown', e).defaultPrevented ||
              ('ontouchstart' in document.documentElement &&
                []
                  .concat(...document.body.children)
                  .forEach((e) => ht.off(e, 'mouseover', ze)),
              this._popper && this._popper.destroy(),
              this._menu.classList.remove(nn),
              this._element.classList.remove(nn),
              this._element.setAttribute('aria-expanded', 'false'),
              Tt.removeDataAttribute(this._menu, 'popper'),
              ht.trigger(this._element, 'hidden.bs.dropdown', e))
          }
          _getConfig(e) {
            if (
              ((e = {
                ...this.constructor.Default,
                ...Tt.getDataAttributes(this._element),
                ...e,
              }),
              Re(Yt, e, this.constructor.DefaultType),
              'object' == typeof e.reference &&
                !Me(e.reference) &&
                'function' != typeof e.reference.getBoundingClientRect)
            )
              throw new TypeError(
                `${Yt.toUpperCase()}: Option "reference" provided type "object" without a required "getBoundingClientRect" method.`,
              )
            return e
          }
          _createPopper(e) {
            if (void 0 === i)
              throw new TypeError(
                "Bootstrap's dropdowns require Popper (https://popper.js.org)",
              )
            let t = this._element
            'parent' === this._config.reference
              ? (t = e)
              : Me(this._config.reference)
              ? (t = qe(this._config.reference))
              : 'object' == typeof this._config.reference &&
                (t = this._config.reference)
            const n = this._getPopperConfig(),
              r = n.modifiers.find(
                (e) => 'applyStyles' === e.name && !1 === e.enabled,
              )
            ;(this._popper = Ne(t, this._menu, n)),
              r && Tt.setDataAttribute(this._menu, 'popper', 'static')
          }
          _isShown(e = this._element) {
            return e.classList.contains(nn)
          }
          _getMenuElement() {
            return Ct.next(this._element, on)[0]
          }
          _getPlacement() {
            const e = this._element.parentNode
            if (e.classList.contains('dropend')) return un
            if (e.classList.contains('dropstart')) return dn
            const t =
              'end' ===
              getComputedStyle(this._menu)
                .getPropertyValue('--bs-position')
                .trim()
            return e.classList.contains('dropup') ? (t ? an : sn) : t ? cn : ln
          }
          _detectNavbar() {
            return null !== this._element.closest('.navbar')
          }
          _getOffset() {
            const { offset: e } = this._config
            return 'string' == typeof e
              ? e.split(',').map((e) => Number.parseInt(e, 10))
              : 'function' == typeof e
              ? (t) => e(t, this._element)
              : e
          }
          _getPopperConfig() {
            const e = {
              placement: this._getPlacement(),
              modifiers: [
                {
                  name: 'preventOverflow',
                  options: { boundary: this._config.boundary },
                },
                { name: 'offset', options: { offset: this._getOffset() } },
              ],
            }
            return (
              'static' === this._config.display &&
                (e.modifiers = [{ name: 'applyStyles', enabled: !1 }]),
              {
                ...e,
                ...('function' == typeof this._config.popperConfig
                  ? this._config.popperConfig(e)
                  : this._config.popperConfig),
              }
            )
          }
          _selectMenuItem({ key: e, target: t }) {
            const n = Ct.find(
              '.dropdown-menu .dropdown-item:not(.disabled):not(:disabled)',
              this._menu,
            ).filter(Be)
            n.length && Ge(n, t, e === Gt, !n.includes(t)).focus()
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = hn.getOrCreateInstance(this, e)
              if ('string' == typeof e) {
                if (void 0 === t[e])
                  throw new TypeError(`No method named "${e}"`)
                t[e]()
              }
            })
          }
          static clearMenus(e) {
            if (
              e &&
              (2 === e.button || ('keyup' === e.type && 'Tab' !== e.key))
            )
              return
            const t = Ct.find(rn)
            for (let n = 0, i = t.length; n < i; n++) {
              const i = hn.getInstance(t[n])
              if (!i || !1 === i._config.autoClose) continue
              if (!i._isShown()) continue
              const r = { relatedTarget: i._element }
              if (e) {
                const t = e.composedPath(),
                  n = t.includes(i._menu)
                if (
                  t.includes(i._element) ||
                  ('inside' === i._config.autoClose && !n) ||
                  ('outside' === i._config.autoClose && n)
                )
                  continue
                if (
                  i._menu.contains(e.target) &&
                  (('keyup' === e.type && 'Tab' === e.key) ||
                    /input|select|option|textarea|form/i.test(e.target.tagName))
                )
                  continue
                'click' === e.type && (r.clickEvent = e)
              }
              i._completeHide(r)
            }
          }
          static getParentFromElement(e) {
            return Ie(e) || e.parentNode
          }
          static dataApiKeydownHandler(e) {
            if (
              /input|textarea/i.test(e.target.tagName)
                ? e.key === Qt ||
                  (e.key !== Kt &&
                    ((e.key !== Gt && e.key !== Jt) || e.target.closest(on)))
                : !Zt.test(e.key)
            )
              return
            const t = this.classList.contains(nn)
            if (!t && e.key === Kt) return
            if ((e.preventDefault(), e.stopPropagation(), We(this))) return
            const n = this.matches(rn) ? this : Ct.prev(this, rn)[0],
              i = hn.getOrCreateInstance(n)
            if (e.key !== Kt)
              return e.key === Jt || e.key === Gt
                ? (t || i.show(), void i._selectMenuItem(e))
                : void ((t && e.key !== Qt) || hn.clearMenus())
            i.hide()
          }
        }
        ht.on(document, tn, rn, hn.dataApiKeydownHandler),
          ht.on(document, tn, on, hn.dataApiKeydownHandler),
          ht.on(document, en, hn.clearMenus),
          ht.on(document, 'keyup.bs.dropdown.data-api', hn.clearMenus),
          ht.on(document, en, rn, function (e) {
            e.preventDefault(), hn.getOrCreateInstance(this).toggle()
          }),
          Ke(hn)
        const gn = '.fixed-top, .fixed-bottom, .is-fixed, .sticky-top',
          mn = '.sticky-top'
        class vn {
          constructor() {
            this._element = document.body
          }
          getWidth() {
            const e = document.documentElement.clientWidth
            return Math.abs(window.innerWidth - e)
          }
          hide() {
            const e = this.getWidth()
            this._disableOverFlow(),
              this._setElementAttributes(
                this._element,
                'paddingRight',
                (t) => t + e,
              ),
              this._setElementAttributes(gn, 'paddingRight', (t) => t + e),
              this._setElementAttributes(mn, 'marginRight', (t) => t - e)
          }
          _disableOverFlow() {
            this._saveInitialAttribute(this._element, 'overflow'),
              (this._element.style.overflow = 'hidden')
          }
          _setElementAttributes(e, t, n) {
            const i = this.getWidth()
            this._applyManipulationCallback(e, (e) => {
              if (e !== this._element && window.innerWidth > e.clientWidth + i)
                return
              this._saveInitialAttribute(e, t)
              const r = window.getComputedStyle(e)[t]
              e.style[t] = `${n(Number.parseFloat(r))}px`
            })
          }
          reset() {
            this._resetElementAttributes(this._element, 'overflow'),
              this._resetElementAttributes(this._element, 'paddingRight'),
              this._resetElementAttributes(gn, 'paddingRight'),
              this._resetElementAttributes(mn, 'marginRight')
          }
          _saveInitialAttribute(e, t) {
            const n = e.style[t]
            n && Tt.setDataAttribute(e, t, n)
          }
          _resetElementAttributes(e, t) {
            this._applyManipulationCallback(e, (e) => {
              const n = Tt.getDataAttribute(e, t)
              void 0 === n
                ? e.style.removeProperty(t)
                : (Tt.removeDataAttribute(e, t), (e.style[t] = n))
            })
          }
          _applyManipulationCallback(e, t) {
            Me(e) ? t(e) : Ct.find(e, this._element).forEach(t)
          }
          isOverflowing() {
            return this.getWidth() > 0
          }
        }
        const yn = {
            className: 'modal-backdrop',
            isVisible: !0,
            isAnimated: !1,
            rootElement: 'body',
            clickCallback: null,
          },
          bn = {
            className: 'string',
            isVisible: 'boolean',
            isAnimated: 'boolean',
            rootElement: '(element|string)',
            clickCallback: '(function|null)',
          },
          _n = 'show',
          wn = 'mousedown.bs.backdrop'
        class xn {
          constructor(e) {
            ;(this._config = this._getConfig(e)),
              (this._isAppended = !1),
              (this._element = null)
          }
          show(e) {
            this._config.isVisible
              ? (this._append(),
                this._config.isAnimated && Ue(this._getElement()),
                this._getElement().classList.add(_n),
                this._emulateAnimation(() => {
                  Qe(e)
                }))
              : Qe(e)
          }
          hide(e) {
            this._config.isVisible
              ? (this._getElement().classList.remove(_n),
                this._emulateAnimation(() => {
                  this.dispose(), Qe(e)
                }))
              : Qe(e)
          }
          _getElement() {
            if (!this._element) {
              const e = document.createElement('div')
              ;(e.className = this._config.className),
                this._config.isAnimated && e.classList.add('fade'),
                (this._element = e)
            }
            return this._element
          }
          _getConfig(e) {
            return (
              ((e = {
                ...yn,
                ...('object' == typeof e ? e : {}),
              }).rootElement = qe(e.rootElement)),
              Re('backdrop', e, bn),
              e
            )
          }
          _append() {
            this._isAppended ||
              (this._config.rootElement.append(this._getElement()),
              ht.on(this._getElement(), wn, () => {
                Qe(this._config.clickCallback)
              }),
              (this._isAppended = !0))
          }
          dispose() {
            this._isAppended &&
              (ht.off(this._element, wn),
              this._element.remove(),
              (this._isAppended = !1))
          }
          _emulateAnimation(e) {
            Je(e, this._getElement(), this._config.isAnimated)
          }
        }
        const En = { trapElement: null, autofocus: !0 },
          Tn = { trapElement: 'element', autofocus: 'boolean' },
          Cn = '.bs.focustrap',
          An = 'backward'
        class kn {
          constructor(e) {
            ;(this._config = this._getConfig(e)),
              (this._isActive = !1),
              (this._lastTabNavDirection = null)
          }
          activate() {
            const { trapElement: e, autofocus: t } = this._config
            this._isActive ||
              (t && e.focus(),
              ht.off(document, Cn),
              ht.on(document, 'focusin.bs.focustrap', (e) =>
                this._handleFocusin(e),
              ),
              ht.on(document, 'keydown.tab.bs.focustrap', (e) =>
                this._handleKeydown(e),
              ),
              (this._isActive = !0))
          }
          deactivate() {
            this._isActive && ((this._isActive = !1), ht.off(document, Cn))
          }
          _handleFocusin(e) {
            const { target: t } = e,
              { trapElement: n } = this._config
            if (t === document || t === n || n.contains(t)) return
            const i = Ct.focusableChildren(n)
            0 === i.length
              ? n.focus()
              : this._lastTabNavDirection === An
              ? i[i.length - 1].focus()
              : i[0].focus()
          }
          _handleKeydown(e) {
            'Tab' === e.key &&
              (this._lastTabNavDirection = e.shiftKey ? An : 'forward')
          }
          _getConfig(e) {
            return (
              (e = { ...En, ...('object' == typeof e ? e : {}) }),
              Re('focustrap', e, Tn),
              e
            )
          }
        }
        const Sn = 'modal',
          On = 'Escape',
          Dn = { backdrop: !0, keyboard: !0, focus: !0 },
          Nn = {
            backdrop: '(boolean|string)',
            keyboard: 'boolean',
            focus: 'boolean',
          },
          Ln = 'hidden.bs.modal',
          jn = 'show.bs.modal',
          $n = 'resize.bs.modal',
          Pn = 'click.dismiss.bs.modal',
          In = 'keydown.dismiss.bs.modal',
          Hn = 'mousedown.dismiss.bs.modal',
          Mn = 'modal-open',
          qn = 'show',
          Rn = 'modal-static'
        class Bn extends vt {
          constructor(e, t) {
            super(e),
              (this._config = this._getConfig(t)),
              (this._dialog = Ct.findOne('.modal-dialog', this._element)),
              (this._backdrop = this._initializeBackDrop()),
              (this._focustrap = this._initializeFocusTrap()),
              (this._isShown = !1),
              (this._ignoreBackdropClick = !1),
              (this._isTransitioning = !1),
              (this._scrollBar = new vn())
          }
          static get Default() {
            return Dn
          }
          static get NAME() {
            return Sn
          }
          toggle(e) {
            return this._isShown ? this.hide() : this.show(e)
          }
          show(e) {
            this._isShown ||
              this._isTransitioning ||
              ht.trigger(this._element, jn, { relatedTarget: e })
                .defaultPrevented ||
              ((this._isShown = !0),
              this._isAnimated() && (this._isTransitioning = !0),
              this._scrollBar.hide(),
              document.body.classList.add(Mn),
              this._adjustDialog(),
              this._setEscapeEvent(),
              this._setResizeEvent(),
              ht.on(this._dialog, Hn, () => {
                ht.one(this._element, 'mouseup.dismiss.bs.modal', (e) => {
                  e.target === this._element && (this._ignoreBackdropClick = !0)
                })
              }),
              this._showBackdrop(() => this._showElement(e)))
          }
          hide() {
            if (!this._isShown || this._isTransitioning) return
            if (ht.trigger(this._element, 'hide.bs.modal').defaultPrevented)
              return
            this._isShown = !1
            const e = this._isAnimated()
            e && (this._isTransitioning = !0),
              this._setEscapeEvent(),
              this._setResizeEvent(),
              this._focustrap.deactivate(),
              this._element.classList.remove(qn),
              ht.off(this._element, Pn),
              ht.off(this._dialog, Hn),
              this._queueCallback(() => this._hideModal(), this._element, e)
          }
          dispose() {
            ;[window, this._dialog].forEach((e) => ht.off(e, '.bs.modal')),
              this._backdrop.dispose(),
              this._focustrap.deactivate(),
              super.dispose()
          }
          handleUpdate() {
            this._adjustDialog()
          }
          _initializeBackDrop() {
            return new xn({
              isVisible: Boolean(this._config.backdrop),
              isAnimated: this._isAnimated(),
            })
          }
          _initializeFocusTrap() {
            return new kn({ trapElement: this._element })
          }
          _getConfig(e) {
            return (
              (e = {
                ...Dn,
                ...Tt.getDataAttributes(this._element),
                ...('object' == typeof e ? e : {}),
              }),
              Re(Sn, e, Nn),
              e
            )
          }
          _showElement(e) {
            const t = this._isAnimated(),
              n = Ct.findOne('.modal-body', this._dialog)
            ;(this._element.parentNode &&
              this._element.parentNode.nodeType === Node.ELEMENT_NODE) ||
              document.body.append(this._element),
              (this._element.style.display = 'block'),
              this._element.removeAttribute('aria-hidden'),
              this._element.setAttribute('aria-modal', !0),
              this._element.setAttribute('role', 'dialog'),
              (this._element.scrollTop = 0),
              n && (n.scrollTop = 0),
              t && Ue(this._element),
              this._element.classList.add(qn),
              this._queueCallback(
                () => {
                  this._config.focus && this._focustrap.activate(),
                    (this._isTransitioning = !1),
                    ht.trigger(this._element, 'shown.bs.modal', {
                      relatedTarget: e,
                    })
                },
                this._dialog,
                t,
              )
          }
          _setEscapeEvent() {
            this._isShown
              ? ht.on(this._element, In, (e) => {
                  this._config.keyboard && e.key === On
                    ? (e.preventDefault(), this.hide())
                    : this._config.keyboard ||
                      e.key !== On ||
                      this._triggerBackdropTransition()
                })
              : ht.off(this._element, In)
          }
          _setResizeEvent() {
            this._isShown
              ? ht.on(window, $n, () => this._adjustDialog())
              : ht.off(window, $n)
          }
          _hideModal() {
            ;(this._element.style.display = 'none'),
              this._element.setAttribute('aria-hidden', !0),
              this._element.removeAttribute('aria-modal'),
              this._element.removeAttribute('role'),
              (this._isTransitioning = !1),
              this._backdrop.hide(() => {
                document.body.classList.remove(Mn),
                  this._resetAdjustments(),
                  this._scrollBar.reset(),
                  ht.trigger(this._element, Ln)
              })
          }
          _showBackdrop(e) {
            ht.on(this._element, Pn, (e) => {
              this._ignoreBackdropClick
                ? (this._ignoreBackdropClick = !1)
                : e.target === e.currentTarget &&
                  (!0 === this._config.backdrop
                    ? this.hide()
                    : 'static' === this._config.backdrop &&
                      this._triggerBackdropTransition())
            }),
              this._backdrop.show(e)
          }
          _isAnimated() {
            return this._element.classList.contains('fade')
          }
          _triggerBackdropTransition() {
            if (
              ht.trigger(this._element, 'hidePrevented.bs.modal')
                .defaultPrevented
            )
              return
            const { classList: e, scrollHeight: t, style: n } = this._element,
              i = t > document.documentElement.clientHeight
            ;(!i && 'hidden' === n.overflowY) ||
              e.contains(Rn) ||
              (i || (n.overflowY = 'hidden'),
              e.add(Rn),
              this._queueCallback(() => {
                e.remove(Rn),
                  i ||
                    this._queueCallback(() => {
                      n.overflowY = ''
                    }, this._dialog)
              }, this._dialog),
              this._element.focus())
          }
          _adjustDialog() {
            const e =
                this._element.scrollHeight >
                document.documentElement.clientHeight,
              t = this._scrollBar.getWidth(),
              n = t > 0
            ;((!n && e && !Ye()) || (n && !e && Ye())) &&
              (this._element.style.paddingLeft = `${t}px`),
              ((n && !e && !Ye()) || (!n && e && Ye())) &&
                (this._element.style.paddingRight = `${t}px`)
          }
          _resetAdjustments() {
            ;(this._element.style.paddingLeft = ''),
              (this._element.style.paddingRight = '')
          }
          static jQueryInterface(e, t) {
            return this.each(function () {
              const n = Bn.getOrCreateInstance(this, e)
              if ('string' == typeof e) {
                if (void 0 === n[e])
                  throw new TypeError(`No method named "${e}"`)
                n[e](t)
              }
            })
          }
        }
        ht.on(
          document,
          'click.bs.modal.data-api',
          '[data-bs-toggle="modal"]',
          function (e) {
            const t = Ie(this)
            ;['A', 'AREA'].includes(this.tagName) && e.preventDefault(),
              ht.one(t, jn, (e) => {
                e.defaultPrevented ||
                  ht.one(t, Ln, () => {
                    Be(this) && this.focus()
                  })
              })
            const n = Ct.findOne('.modal.show')
            n && Bn.getInstance(n).hide(),
              Bn.getOrCreateInstance(t).toggle(this)
          },
        ),
          yt(Bn),
          Ke(Bn)
        const Wn = 'offcanvas',
          Fn = { backdrop: !0, keyboard: !0, scroll: !1 },
          zn = { backdrop: 'boolean', keyboard: 'boolean', scroll: 'boolean' },
          Un = 'show',
          Vn = '.offcanvas.show',
          Xn = 'hidden.bs.offcanvas'
        class Yn extends vt {
          constructor(e, t) {
            super(e),
              (this._config = this._getConfig(t)),
              (this._isShown = !1),
              (this._backdrop = this._initializeBackDrop()),
              (this._focustrap = this._initializeFocusTrap()),
              this._addEventListeners()
          }
          static get NAME() {
            return Wn
          }
          static get Default() {
            return Fn
          }
          toggle(e) {
            return this._isShown ? this.hide() : this.show(e)
          }
          show(e) {
            this._isShown ||
              ht.trigger(this._element, 'show.bs.offcanvas', {
                relatedTarget: e,
              }).defaultPrevented ||
              ((this._isShown = !0),
              (this._element.style.visibility = 'visible'),
              this._backdrop.show(),
              this._config.scroll || new vn().hide(),
              this._element.removeAttribute('aria-hidden'),
              this._element.setAttribute('aria-modal', !0),
              this._element.setAttribute('role', 'dialog'),
              this._element.classList.add(Un),
              this._queueCallback(
                () => {
                  this._config.scroll || this._focustrap.activate(),
                    ht.trigger(this._element, 'shown.bs.offcanvas', {
                      relatedTarget: e,
                    })
                },
                this._element,
                !0,
              ))
          }
          hide() {
            this._isShown &&
              (ht.trigger(this._element, 'hide.bs.offcanvas')
                .defaultPrevented ||
                (this._focustrap.deactivate(),
                this._element.blur(),
                (this._isShown = !1),
                this._element.classList.remove(Un),
                this._backdrop.hide(),
                this._queueCallback(
                  () => {
                    this._element.setAttribute('aria-hidden', !0),
                      this._element.removeAttribute('aria-modal'),
                      this._element.removeAttribute('role'),
                      (this._element.style.visibility = 'hidden'),
                      this._config.scroll || new vn().reset(),
                      ht.trigger(this._element, Xn)
                  },
                  this._element,
                  !0,
                )))
          }
          dispose() {
            this._backdrop.dispose(),
              this._focustrap.deactivate(),
              super.dispose()
          }
          _getConfig(e) {
            return (
              (e = {
                ...Fn,
                ...Tt.getDataAttributes(this._element),
                ...('object' == typeof e ? e : {}),
              }),
              Re(Wn, e, zn),
              e
            )
          }
          _initializeBackDrop() {
            return new xn({
              className: 'offcanvas-backdrop',
              isVisible: this._config.backdrop,
              isAnimated: !0,
              rootElement: this._element.parentNode,
              clickCallback: () => this.hide(),
            })
          }
          _initializeFocusTrap() {
            return new kn({ trapElement: this._element })
          }
          _addEventListeners() {
            ht.on(this._element, 'keydown.dismiss.bs.offcanvas', (e) => {
              this._config.keyboard && 'Escape' === e.key && this.hide()
            })
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = Yn.getOrCreateInstance(this, e)
              if ('string' == typeof e) {
                if (void 0 === t[e] || e.startsWith('_') || 'constructor' === e)
                  throw new TypeError(`No method named "${e}"`)
                t[e](this)
              }
            })
          }
        }
        ht.on(
          document,
          'click.bs.offcanvas.data-api',
          '[data-bs-toggle="offcanvas"]',
          function (e) {
            const t = Ie(this)
            if (
              (['A', 'AREA'].includes(this.tagName) && e.preventDefault(),
              We(this))
            )
              return
            ht.one(t, Xn, () => {
              Be(this) && this.focus()
            })
            const n = Ct.findOne(Vn)
            n && n !== t && Yn.getInstance(n).hide(),
              Yn.getOrCreateInstance(t).toggle(this)
          },
        ),
          ht.on(window, 'load.bs.offcanvas.data-api', () =>
            Ct.find(Vn).forEach((e) => Yn.getOrCreateInstance(e).show()),
          ),
          yt(Yn),
          Ke(Yn)
        const Kn = new Set([
            'background',
            'cite',
            'href',
            'itemtype',
            'longdesc',
            'poster',
            'src',
            'xlink:href',
          ]),
          Qn = /^(?:(?:https?|mailto|ftp|tel|file|sms):|[^#&/:?]*(?:[#/?]|$))/i,
          Jn = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
          Gn = (e, t) => {
            const n = e.nodeName.toLowerCase()
            if (t.includes(n))
              return (
                !Kn.has(n) ||
                Boolean(Qn.test(e.nodeValue) || Jn.test(e.nodeValue))
              )
            const i = t.filter((e) => e instanceof RegExp)
            for (let e = 0, t = i.length; e < t; e++)
              if (i[e].test(n)) return !0
            return !1
          }
        function Zn(e, t, n) {
          if (!e.length) return e
          if (n && 'function' == typeof n) return n(e)
          const i = new window.DOMParser().parseFromString(e, 'text/html'),
            r = [].concat(...i.body.querySelectorAll('*'))
          for (let e = 0, n = r.length; e < n; e++) {
            const n = r[e],
              i = n.nodeName.toLowerCase()
            if (!Object.keys(t).includes(i)) {
              n.remove()
              continue
            }
            const o = [].concat(...n.attributes),
              s = [].concat(t['*'] || [], t[i] || [])
            o.forEach((e) => {
              Gn(e, s) || n.removeAttribute(e.nodeName)
            })
          }
          return i.body.innerHTML
        }
        const ei = 'tooltip',
          ti = new Set(['sanitize', 'allowList', 'sanitizeFn']),
          ni = {
            animation: 'boolean',
            template: 'string',
            title: '(string|element|function)',
            trigger: 'string',
            delay: '(number|object)',
            html: 'boolean',
            selector: '(string|boolean)',
            placement: '(string|function)',
            offset: '(array|string|function)',
            container: '(string|element|boolean)',
            fallbackPlacements: 'array',
            boundary: '(string|element)',
            customClass: '(string|function)',
            sanitize: 'boolean',
            sanitizeFn: '(null|function)',
            allowList: 'object',
            popperConfig: '(null|object|function)',
          },
          ii = {
            AUTO: 'auto',
            TOP: 'top',
            RIGHT: Ye() ? 'left' : 'right',
            BOTTOM: 'bottom',
            LEFT: Ye() ? 'right' : 'left',
          },
          ri = {
            animation: !0,
            template:
              '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
            trigger: 'hover focus',
            title: '',
            delay: 0,
            html: !1,
            selector: !1,
            placement: 'top',
            offset: [0, 0],
            container: !1,
            fallbackPlacements: ['top', 'right', 'bottom', 'left'],
            boundary: 'clippingParents',
            customClass: '',
            sanitize: !0,
            sanitizeFn: null,
            allowList: {
              '*': ['class', 'dir', 'id', 'lang', 'role', /^aria-[\w-]*$/i],
              a: ['target', 'href', 'title', 'rel'],
              area: [],
              b: [],
              br: [],
              col: [],
              code: [],
              div: [],
              em: [],
              hr: [],
              h1: [],
              h2: [],
              h3: [],
              h4: [],
              h5: [],
              h6: [],
              i: [],
              img: ['src', 'srcset', 'alt', 'title', 'width', 'height'],
              li: [],
              ol: [],
              p: [],
              pre: [],
              s: [],
              small: [],
              span: [],
              sub: [],
              sup: [],
              strong: [],
              u: [],
              ul: [],
            },
            popperConfig: null,
          },
          oi = {
            HIDE: 'hide.bs.tooltip',
            HIDDEN: 'hidden.bs.tooltip',
            SHOW: 'show.bs.tooltip',
            SHOWN: 'shown.bs.tooltip',
            INSERTED: 'inserted.bs.tooltip',
            CLICK: 'click.bs.tooltip',
            FOCUSIN: 'focusin.bs.tooltip',
            FOCUSOUT: 'focusout.bs.tooltip',
            MOUSEENTER: 'mouseenter.bs.tooltip',
            MOUSELEAVE: 'mouseleave.bs.tooltip',
          },
          si = 'fade',
          ai = 'show',
          li = 'show',
          ci = 'out',
          ui = '.tooltip-inner',
          di = '.modal',
          fi = 'hide.bs.modal',
          pi = 'hover',
          hi = 'focus'
        class gi extends vt {
          constructor(e, t) {
            if (void 0 === i)
              throw new TypeError(
                "Bootstrap's tooltips require Popper (https://popper.js.org)",
              )
            super(e),
              (this._isEnabled = !0),
              (this._timeout = 0),
              (this._hoverState = ''),
              (this._activeTrigger = {}),
              (this._popper = null),
              (this._config = this._getConfig(t)),
              (this.tip = null),
              this._setListeners()
          }
          static get Default() {
            return ri
          }
          static get NAME() {
            return ei
          }
          static get Event() {
            return oi
          }
          static get DefaultType() {
            return ni
          }
          enable() {
            this._isEnabled = !0
          }
          disable() {
            this._isEnabled = !1
          }
          toggleEnabled() {
            this._isEnabled = !this._isEnabled
          }
          toggle(e) {
            if (this._isEnabled)
              if (e) {
                const t = this._initializeOnDelegatedTarget(e)
                ;(t._activeTrigger.click = !t._activeTrigger.click),
                  t._isWithActiveTrigger()
                    ? t._enter(null, t)
                    : t._leave(null, t)
              } else {
                if (this.getTipElement().classList.contains(ai))
                  return void this._leave(null, this)
                this._enter(null, this)
              }
          }
          dispose() {
            clearTimeout(this._timeout),
              ht.off(this._element.closest(di), fi, this._hideModalHandler),
              this.tip && this.tip.remove(),
              this._disposePopper(),
              super.dispose()
          }
          show() {
            if ('none' === this._element.style.display)
              throw new Error('Please use show on visible elements')
            if (!this.isWithContent() || !this._isEnabled) return
            const e = ht.trigger(this._element, this.constructor.Event.SHOW),
              t = Fe(this._element),
              n =
                null === t
                  ? this._element.ownerDocument.documentElement.contains(
                      this._element,
                    )
                  : t.contains(this._element)
            if (e.defaultPrevented || !n) return
            'tooltip' === this.constructor.NAME &&
              this.tip &&
              this.getTitle() !== this.tip.querySelector(ui).innerHTML &&
              (this._disposePopper(), this.tip.remove(), (this.tip = null))
            const i = this.getTipElement(),
              r = ((e) => {
                do {
                  e += Math.floor(1e6 * Math.random())
                } while (document.getElementById(e))
                return e
              })(this.constructor.NAME)
            i.setAttribute('id', r),
              this._element.setAttribute('aria-describedby', r),
              this._config.animation && i.classList.add(si)
            const o =
                'function' == typeof this._config.placement
                  ? this._config.placement.call(this, i, this._element)
                  : this._config.placement,
              s = this._getAttachment(o)
            this._addAttachmentClass(s)
            const { container: a } = this._config
            mt.set(i, this.constructor.DATA_KEY, this),
              this._element.ownerDocument.documentElement.contains(this.tip) ||
                (a.append(i),
                ht.trigger(this._element, this.constructor.Event.INSERTED)),
              this._popper
                ? this._popper.update()
                : (this._popper = Ne(
                    this._element,
                    i,
                    this._getPopperConfig(s),
                  )),
              i.classList.add(ai)
            const l = this._resolvePossibleFunction(this._config.customClass)
            l && i.classList.add(...l.split(' ')),
              'ontouchstart' in document.documentElement &&
                [].concat(...document.body.children).forEach((e) => {
                  ht.on(e, 'mouseover', ze)
                })
            const c = this.tip.classList.contains(si)
            this._queueCallback(
              () => {
                const e = this._hoverState
                ;(this._hoverState = null),
                  ht.trigger(this._element, this.constructor.Event.SHOWN),
                  e === ci && this._leave(null, this)
              },
              this.tip,
              c,
            )
          }
          hide() {
            if (!this._popper) return
            const e = this.getTipElement()
            if (
              ht.trigger(this._element, this.constructor.Event.HIDE)
                .defaultPrevented
            )
              return
            e.classList.remove(ai),
              'ontouchstart' in document.documentElement &&
                []
                  .concat(...document.body.children)
                  .forEach((e) => ht.off(e, 'mouseover', ze)),
              (this._activeTrigger.click = !1),
              (this._activeTrigger.focus = !1),
              (this._activeTrigger.hover = !1)
            const t = this.tip.classList.contains(si)
            this._queueCallback(
              () => {
                this._isWithActiveTrigger() ||
                  (this._hoverState !== li && e.remove(),
                  this._cleanTipClass(),
                  this._element.removeAttribute('aria-describedby'),
                  ht.trigger(this._element, this.constructor.Event.HIDDEN),
                  this._disposePopper())
              },
              this.tip,
              t,
            ),
              (this._hoverState = '')
          }
          update() {
            null !== this._popper && this._popper.update()
          }
          isWithContent() {
            return Boolean(this.getTitle())
          }
          getTipElement() {
            if (this.tip) return this.tip
            const e = document.createElement('div')
            e.innerHTML = this._config.template
            const t = e.children[0]
            return (
              this.setContent(t),
              t.classList.remove(si, ai),
              (this.tip = t),
              this.tip
            )
          }
          setContent(e) {
            this._sanitizeAndSetContent(e, this.getTitle(), ui)
          }
          _sanitizeAndSetContent(e, t, n) {
            const i = Ct.findOne(n, e)
            t || !i ? this.setElementContent(i, t) : i.remove()
          }
          setElementContent(e, t) {
            if (null !== e)
              return Me(t)
                ? ((t = qe(t)),
                  void (this._config.html
                    ? t.parentNode !== e && ((e.innerHTML = ''), e.append(t))
                    : (e.textContent = t.textContent)))
                : void (this._config.html
                    ? (this._config.sanitize &&
                        (t = Zn(
                          t,
                          this._config.allowList,
                          this._config.sanitizeFn,
                        )),
                      (e.innerHTML = t))
                    : (e.textContent = t))
          }
          getTitle() {
            const e =
              this._element.getAttribute('data-bs-original-title') ||
              this._config.title
            return this._resolvePossibleFunction(e)
          }
          updateAttachment(e) {
            return 'right' === e ? 'end' : 'left' === e ? 'start' : e
          }
          _initializeOnDelegatedTarget(e, t) {
            return (
              t ||
              this.constructor.getOrCreateInstance(
                e.delegateTarget,
                this._getDelegateConfig(),
              )
            )
          }
          _getOffset() {
            const { offset: e } = this._config
            return 'string' == typeof e
              ? e.split(',').map((e) => Number.parseInt(e, 10))
              : 'function' == typeof e
              ? (t) => e(t, this._element)
              : e
          }
          _resolvePossibleFunction(e) {
            return 'function' == typeof e ? e.call(this._element) : e
          }
          _getPopperConfig(e) {
            const t = {
              placement: e,
              modifiers: [
                {
                  name: 'flip',
                  options: {
                    fallbackPlacements: this._config.fallbackPlacements,
                  },
                },
                { name: 'offset', options: { offset: this._getOffset() } },
                {
                  name: 'preventOverflow',
                  options: { boundary: this._config.boundary },
                },
                {
                  name: 'arrow',
                  options: { element: `.${this.constructor.NAME}-arrow` },
                },
                {
                  name: 'onChange',
                  enabled: !0,
                  phase: 'afterWrite',
                  fn: (e) => this._handlePopperPlacementChange(e),
                },
              ],
              onFirstUpdate: (e) => {
                e.options.placement !== e.placement &&
                  this._handlePopperPlacementChange(e)
              },
            }
            return {
              ...t,
              ...('function' == typeof this._config.popperConfig
                ? this._config.popperConfig(t)
                : this._config.popperConfig),
            }
          }
          _addAttachmentClass(e) {
            this.getTipElement().classList.add(
              `${this._getBasicClassPrefix()}-${this.updateAttachment(e)}`,
            )
          }
          _getAttachment(e) {
            return ii[e.toUpperCase()]
          }
          _setListeners() {
            this._config.trigger.split(' ').forEach((e) => {
              if ('click' === e)
                ht.on(
                  this._element,
                  this.constructor.Event.CLICK,
                  this._config.selector,
                  (e) => this.toggle(e),
                )
              else if ('manual' !== e) {
                const t =
                    e === pi
                      ? this.constructor.Event.MOUSEENTER
                      : this.constructor.Event.FOCUSIN,
                  n =
                    e === pi
                      ? this.constructor.Event.MOUSELEAVE
                      : this.constructor.Event.FOCUSOUT
                ht.on(this._element, t, this._config.selector, (e) =>
                  this._enter(e),
                ),
                  ht.on(this._element, n, this._config.selector, (e) =>
                    this._leave(e),
                  )
              }
            }),
              (this._hideModalHandler = () => {
                this._element && this.hide()
              }),
              ht.on(this._element.closest(di), fi, this._hideModalHandler),
              this._config.selector
                ? (this._config = {
                    ...this._config,
                    trigger: 'manual',
                    selector: '',
                  })
                : this._fixTitle()
          }
          _fixTitle() {
            const e = this._element.getAttribute('title'),
              t = typeof this._element.getAttribute('data-bs-original-title')
            ;(e || 'string' !== t) &&
              (this._element.setAttribute('data-bs-original-title', e || ''),
              !e ||
                this._element.getAttribute('aria-label') ||
                this._element.textContent ||
                this._element.setAttribute('aria-label', e),
              this._element.setAttribute('title', ''))
          }
          _enter(e, t) {
            ;(t = this._initializeOnDelegatedTarget(e, t)),
              e && (t._activeTrigger['focusin' === e.type ? hi : pi] = !0),
              t.getTipElement().classList.contains(ai) || t._hoverState === li
                ? (t._hoverState = li)
                : (clearTimeout(t._timeout),
                  (t._hoverState = li),
                  t._config.delay && t._config.delay.show
                    ? (t._timeout = setTimeout(() => {
                        t._hoverState === li && t.show()
                      }, t._config.delay.show))
                    : t.show())
          }
          _leave(e, t) {
            ;(t = this._initializeOnDelegatedTarget(e, t)),
              e &&
                (t._activeTrigger[
                  'focusout' === e.type ? hi : pi
                ] = t._element.contains(e.relatedTarget)),
              t._isWithActiveTrigger() ||
                (clearTimeout(t._timeout),
                (t._hoverState = ci),
                t._config.delay && t._config.delay.hide
                  ? (t._timeout = setTimeout(() => {
                      t._hoverState === ci && t.hide()
                    }, t._config.delay.hide))
                  : t.hide())
          }
          _isWithActiveTrigger() {
            for (const e in this._activeTrigger)
              if (this._activeTrigger[e]) return !0
            return !1
          }
          _getConfig(e) {
            const t = Tt.getDataAttributes(this._element)
            return (
              Object.keys(t).forEach((e) => {
                ti.has(e) && delete t[e]
              }),
              ((e = {
                ...this.constructor.Default,
                ...t,
                ...('object' == typeof e && e ? e : {}),
              }).container =
                !1 === e.container ? document.body : qe(e.container)),
              'number' == typeof e.delay &&
                (e.delay = { show: e.delay, hide: e.delay }),
              'number' == typeof e.title && (e.title = e.title.toString()),
              'number' == typeof e.content &&
                (e.content = e.content.toString()),
              Re(ei, e, this.constructor.DefaultType),
              e.sanitize &&
                (e.template = Zn(e.template, e.allowList, e.sanitizeFn)),
              e
            )
          }
          _getDelegateConfig() {
            const e = {}
            for (const t in this._config)
              this.constructor.Default[t] !== this._config[t] &&
                (e[t] = this._config[t])
            return e
          }
          _cleanTipClass() {
            const e = this.getTipElement(),
              t = new RegExp(`(^|\\s)${this._getBasicClassPrefix()}\\S+`, 'g'),
              n = e.getAttribute('class').match(t)
            null !== n &&
              n.length > 0 &&
              n.map((e) => e.trim()).forEach((t) => e.classList.remove(t))
          }
          _getBasicClassPrefix() {
            return 'bs-tooltip'
          }
          _handlePopperPlacementChange(e) {
            const { state: t } = e
            t &&
              ((this.tip = t.elements.popper),
              this._cleanTipClass(),
              this._addAttachmentClass(this._getAttachment(t.placement)))
          }
          _disposePopper() {
            this._popper && (this._popper.destroy(), (this._popper = null))
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = gi.getOrCreateInstance(this, e)
              if ('string' == typeof e) {
                if (void 0 === t[e])
                  throw new TypeError(`No method named "${e}"`)
                t[e]()
              }
            })
          }
        }
        Ke(gi)
        const mi = {
            ...gi.Default,
            placement: 'right',
            offset: [0, 8],
            trigger: 'click',
            content: '',
            template:
              '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
          },
          vi = { ...gi.DefaultType, content: '(string|element|function)' },
          yi = {
            HIDE: 'hide.bs.popover',
            HIDDEN: 'hidden.bs.popover',
            SHOW: 'show.bs.popover',
            SHOWN: 'shown.bs.popover',
            INSERTED: 'inserted.bs.popover',
            CLICK: 'click.bs.popover',
            FOCUSIN: 'focusin.bs.popover',
            FOCUSOUT: 'focusout.bs.popover',
            MOUSEENTER: 'mouseenter.bs.popover',
            MOUSELEAVE: 'mouseleave.bs.popover',
          }
        class bi extends gi {
          static get Default() {
            return mi
          }
          static get NAME() {
            return 'popover'
          }
          static get Event() {
            return yi
          }
          static get DefaultType() {
            return vi
          }
          isWithContent() {
            return this.getTitle() || this._getContent()
          }
          setContent(e) {
            this._sanitizeAndSetContent(e, this.getTitle(), '.popover-header'),
              this._sanitizeAndSetContent(
                e,
                this._getContent(),
                '.popover-body',
              )
          }
          _getContent() {
            return this._resolvePossibleFunction(this._config.content)
          }
          _getBasicClassPrefix() {
            return 'bs-popover'
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = bi.getOrCreateInstance(this, e)
              if ('string' == typeof e) {
                if (void 0 === t[e])
                  throw new TypeError(`No method named "${e}"`)
                t[e]()
              }
            })
          }
        }
        Ke(bi)
        const _i = 'scrollspy',
          wi = { offset: 10, method: 'auto', target: '' },
          xi = {
            offset: 'number',
            method: 'string',
            target: '(string|element)',
          },
          Ei = 'active',
          Ti = '.nav-link, .list-group-item, .dropdown-item',
          Ci = 'position'
        class Ai extends vt {
          constructor(e, t) {
            super(e),
              (this._scrollElement =
                'BODY' === this._element.tagName ? window : this._element),
              (this._config = this._getConfig(t)),
              (this._offsets = []),
              (this._targets = []),
              (this._activeTarget = null),
              (this._scrollHeight = 0),
              ht.on(this._scrollElement, 'scroll.bs.scrollspy', () =>
                this._process(),
              ),
              this.refresh(),
              this._process()
          }
          static get Default() {
            return wi
          }
          static get NAME() {
            return _i
          }
          refresh() {
            const e =
                this._scrollElement === this._scrollElement.window
                  ? 'offset'
                  : Ci,
              t = 'auto' === this._config.method ? e : this._config.method,
              n = t === Ci ? this._getScrollTop() : 0
            ;(this._offsets = []),
              (this._targets = []),
              (this._scrollHeight = this._getScrollHeight()),
              Ct.find(Ti, this._config.target)
                .map((e) => {
                  const i = Pe(e),
                    r = i ? Ct.findOne(i) : null
                  if (r) {
                    const e = r.getBoundingClientRect()
                    if (e.width || e.height) return [Tt[t](r).top + n, i]
                  }
                  return null
                })
                .filter((e) => e)
                .sort((e, t) => e[0] - t[0])
                .forEach((e) => {
                  this._offsets.push(e[0]), this._targets.push(e[1])
                })
          }
          dispose() {
            ht.off(this._scrollElement, '.bs.scrollspy'), super.dispose()
          }
          _getConfig(e) {
            return (
              ((e = {
                ...wi,
                ...Tt.getDataAttributes(this._element),
                ...('object' == typeof e && e ? e : {}),
              }).target = qe(e.target) || document.documentElement),
              Re(_i, e, xi),
              e
            )
          }
          _getScrollTop() {
            return this._scrollElement === window
              ? this._scrollElement.pageYOffset
              : this._scrollElement.scrollTop
          }
          _getScrollHeight() {
            return (
              this._scrollElement.scrollHeight ||
              Math.max(
                document.body.scrollHeight,
                document.documentElement.scrollHeight,
              )
            )
          }
          _getOffsetHeight() {
            return this._scrollElement === window
              ? window.innerHeight
              : this._scrollElement.getBoundingClientRect().height
          }
          _process() {
            const e = this._getScrollTop() + this._config.offset,
              t = this._getScrollHeight(),
              n = this._config.offset + t - this._getOffsetHeight()
            if ((this._scrollHeight !== t && this.refresh(), e >= n)) {
              const e = this._targets[this._targets.length - 1]
              this._activeTarget !== e && this._activate(e)
            } else {
              if (
                this._activeTarget &&
                e < this._offsets[0] &&
                this._offsets[0] > 0
              )
                return (this._activeTarget = null), void this._clear()
              for (let t = this._offsets.length; t--; )
                this._activeTarget !== this._targets[t] &&
                  e >= this._offsets[t] &&
                  (void 0 === this._offsets[t + 1] ||
                    e < this._offsets[t + 1]) &&
                  this._activate(this._targets[t])
            }
          }
          _activate(e) {
            ;(this._activeTarget = e), this._clear()
            const t = Ti.split(',').map(
                (t) => `${t}[data-bs-target="${e}"],${t}[href="${e}"]`,
              ),
              n = Ct.findOne(t.join(','), this._config.target)
            n.classList.add(Ei),
              n.classList.contains('dropdown-item')
                ? Ct.findOne(
                    '.dropdown-toggle',
                    n.closest('.dropdown'),
                  ).classList.add(Ei)
                : Ct.parents(n, '.nav, .list-group').forEach((e) => {
                    Ct.prev(e, '.nav-link, .list-group-item').forEach((e) =>
                      e.classList.add(Ei),
                    ),
                      Ct.prev(e, '.nav-item').forEach((e) => {
                        Ct.children(e, '.nav-link').forEach((e) =>
                          e.classList.add(Ei),
                        )
                      })
                  }),
              ht.trigger(this._scrollElement, 'activate.bs.scrollspy', {
                relatedTarget: e,
              })
          }
          _clear() {
            Ct.find(Ti, this._config.target)
              .filter((e) => e.classList.contains(Ei))
              .forEach((e) => e.classList.remove(Ei))
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = Ai.getOrCreateInstance(this, e)
              if ('string' == typeof e) {
                if (void 0 === t[e])
                  throw new TypeError(`No method named "${e}"`)
                t[e]()
              }
            })
          }
        }
        ht.on(window, 'load.bs.scrollspy.data-api', () => {
          Ct.find('[data-bs-spy="scroll"]').forEach((e) => new Ai(e))
        }),
          Ke(Ai)
        const ki = 'active',
          Si = 'fade',
          Oi = 'show',
          Di = '.active',
          Ni = ':scope > li > .active'
        class Li extends vt {
          static get NAME() {
            return 'tab'
          }
          show() {
            if (
              this._element.parentNode &&
              this._element.parentNode.nodeType === Node.ELEMENT_NODE &&
              this._element.classList.contains(ki)
            )
              return
            let e
            const t = Ie(this._element),
              n = this._element.closest('.nav, .list-group')
            if (n) {
              const t = 'UL' === n.nodeName || 'OL' === n.nodeName ? Ni : Di
              ;(e = Ct.find(t, n)), (e = e[e.length - 1])
            }
            const i = e
              ? ht.trigger(e, 'hide.bs.tab', { relatedTarget: this._element })
              : null
            if (
              ht.trigger(this._element, 'show.bs.tab', { relatedTarget: e })
                .defaultPrevented ||
              (null !== i && i.defaultPrevented)
            )
              return
            this._activate(this._element, n)
            const r = () => {
              ht.trigger(e, 'hidden.bs.tab', { relatedTarget: this._element }),
                ht.trigger(this._element, 'shown.bs.tab', { relatedTarget: e })
            }
            t ? this._activate(t, t.parentNode, r) : r()
          }
          _activate(e, t, n) {
            const i = (!t || ('UL' !== t.nodeName && 'OL' !== t.nodeName)
                ? Ct.children(t, Di)
                : Ct.find(Ni, t))[0],
              r = n && i && i.classList.contains(Si),
              o = () => this._transitionComplete(e, i, n)
            i && r
              ? (i.classList.remove(Oi), this._queueCallback(o, e, !0))
              : o()
          }
          _transitionComplete(e, t, n) {
            if (t) {
              t.classList.remove(ki)
              const e = Ct.findOne(
                ':scope > .dropdown-menu .active',
                t.parentNode,
              )
              e && e.classList.remove(ki),
                'tab' === t.getAttribute('role') &&
                  t.setAttribute('aria-selected', !1)
            }
            e.classList.add(ki),
              'tab' === e.getAttribute('role') &&
                e.setAttribute('aria-selected', !0),
              Ue(e),
              e.classList.contains(Si) && e.classList.add(Oi)
            let i = e.parentNode
            if (
              (i && 'LI' === i.nodeName && (i = i.parentNode),
              i && i.classList.contains('dropdown-menu'))
            ) {
              const t = e.closest('.dropdown')
              t &&
                Ct.find('.dropdown-toggle', t).forEach((e) =>
                  e.classList.add(ki),
                ),
                e.setAttribute('aria-expanded', !0)
            }
            n && n()
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = Li.getOrCreateInstance(this)
              if ('string' == typeof e) {
                if (void 0 === t[e])
                  throw new TypeError(`No method named "${e}"`)
                t[e]()
              }
            })
          }
        }
        ht.on(
          document,
          'click.bs.tab.data-api',
          '[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]',
          function (e) {
            ;['A', 'AREA'].includes(this.tagName) && e.preventDefault(),
              We(this) || Li.getOrCreateInstance(this).show()
          },
        ),
          Ke(Li)
        const ji = 'toast',
          $i = 'hide',
          Pi = 'show',
          Ii = 'showing',
          Hi = { animation: 'boolean', autohide: 'boolean', delay: 'number' },
          Mi = { animation: !0, autohide: !0, delay: 5e3 }
        class qi extends vt {
          constructor(e, t) {
            super(e),
              (this._config = this._getConfig(t)),
              (this._timeout = null),
              (this._hasMouseInteraction = !1),
              (this._hasKeyboardInteraction = !1),
              this._setListeners()
          }
          static get DefaultType() {
            return Hi
          }
          static get Default() {
            return Mi
          }
          static get NAME() {
            return ji
          }
          show() {
            ht.trigger(this._element, 'show.bs.toast').defaultPrevented ||
              (this._clearTimeout(),
              this._config.animation && this._element.classList.add('fade'),
              this._element.classList.remove($i),
              Ue(this._element),
              this._element.classList.add(Pi),
              this._element.classList.add(Ii),
              this._queueCallback(
                () => {
                  this._element.classList.remove(Ii),
                    ht.trigger(this._element, 'shown.bs.toast'),
                    this._maybeScheduleHide()
                },
                this._element,
                this._config.animation,
              ))
          }
          hide() {
            this._element.classList.contains(Pi) &&
              (ht.trigger(this._element, 'hide.bs.toast').defaultPrevented ||
                (this._element.classList.add(Ii),
                this._queueCallback(
                  () => {
                    this._element.classList.add($i),
                      this._element.classList.remove(Ii),
                      this._element.classList.remove(Pi),
                      ht.trigger(this._element, 'hidden.bs.toast')
                  },
                  this._element,
                  this._config.animation,
                )))
          }
          dispose() {
            this._clearTimeout(),
              this._element.classList.contains(Pi) &&
                this._element.classList.remove(Pi),
              super.dispose()
          }
          _getConfig(e) {
            return (
              (e = {
                ...Mi,
                ...Tt.getDataAttributes(this._element),
                ...('object' == typeof e && e ? e : {}),
              }),
              Re(ji, e, this.constructor.DefaultType),
              e
            )
          }
          _maybeScheduleHide() {
            this._config.autohide &&
              (this._hasMouseInteraction ||
                this._hasKeyboardInteraction ||
                (this._timeout = setTimeout(() => {
                  this.hide()
                }, this._config.delay)))
          }
          _onInteraction(e, t) {
            switch (e.type) {
              case 'mouseover':
              case 'mouseout':
                this._hasMouseInteraction = t
                break
              case 'focusin':
              case 'focusout':
                this._hasKeyboardInteraction = t
            }
            if (t) return void this._clearTimeout()
            const n = e.relatedTarget
            this._element === n ||
              this._element.contains(n) ||
              this._maybeScheduleHide()
          }
          _setListeners() {
            ht.on(this._element, 'mouseover.bs.toast', (e) =>
              this._onInteraction(e, !0),
            ),
              ht.on(this._element, 'mouseout.bs.toast', (e) =>
                this._onInteraction(e, !1),
              ),
              ht.on(this._element, 'focusin.bs.toast', (e) =>
                this._onInteraction(e, !0),
              ),
              ht.on(this._element, 'focusout.bs.toast', (e) =>
                this._onInteraction(e, !1),
              )
          }
          _clearTimeout() {
            clearTimeout(this._timeout), (this._timeout = null)
          }
          static jQueryInterface(e) {
            return this.each(function () {
              const t = qi.getOrCreateInstance(this, e)
              if ('string' == typeof e) {
                if (void 0 === t[e])
                  throw new TypeError(`No method named "${e}"`)
                t[e](this)
              }
            })
          }
        }
        yt(qi), Ke(qi)
      },
      9755: function (e, t) {
        var n
        /*!
         * jQuery JavaScript Library v3.6.0
         * https://jquery.com/
         *
         * Includes Sizzle.js
         * https://sizzlejs.com/
         *
         * Copyright OpenJS Foundation and other contributors
         * Released under the MIT license
         * https://jquery.org/license
         *
         * Date: 2021-03-02T17:08Z
         */ !(function (t, n) {
          'use strict'
          'object' == typeof e.exports
            ? (e.exports = t.document
                ? n(t, !0)
                : function (e) {
                    if (!e.document)
                      throw new Error(
                        'jQuery requires a window with a document',
                      )
                    return n(e)
                  })
            : n(t)
        })('undefined' != typeof window ? window : this, function (i, r) {
          'use strict'
          var o = [],
            s = Object.getPrototypeOf,
            a = o.slice,
            l = o.flat
              ? function (e) {
                  return o.flat.call(e)
                }
              : function (e) {
                  return o.concat.apply([], e)
                },
            c = o.push,
            u = o.indexOf,
            d = {},
            f = d.toString,
            p = d.hasOwnProperty,
            h = p.toString,
            g = h.call(Object),
            m = {},
            v = function (e) {
              return (
                'function' == typeof e &&
                'number' != typeof e.nodeType &&
                'function' != typeof e.item
              )
            },
            y = function (e) {
              return null != e && e === e.window
            },
            b = i.document,
            _ = { type: !0, src: !0, nonce: !0, noModule: !0 }
          function w(e, t, n) {
            var i,
              r,
              o = (n = n || b).createElement('script')
            if (((o.text = e), t))
              for (i in _)
                (r = t[i] || (t.getAttribute && t.getAttribute(i))) &&
                  o.setAttribute(i, r)
            n.head.appendChild(o).parentNode.removeChild(o)
          }
          function x(e) {
            return null == e
              ? e + ''
              : 'object' == typeof e || 'function' == typeof e
              ? d[f.call(e)] || 'object'
              : typeof e
          }
          var E = '3.6.0',
            T = function (e, t) {
              return new T.fn.init(e, t)
            }
          function C(e) {
            var t = !!e && 'length' in e && e.length,
              n = x(e)
            return (
              !v(e) &&
              !y(e) &&
              ('array' === n ||
                0 === t ||
                ('number' == typeof t && t > 0 && t - 1 in e))
            )
          }
          ;(T.fn = T.prototype = {
            jquery: E,
            constructor: T,
            length: 0,
            toArray: function () {
              return a.call(this)
            },
            get: function (e) {
              return null == e
                ? a.call(this)
                : e < 0
                ? this[e + this.length]
                : this[e]
            },
            pushStack: function (e) {
              var t = T.merge(this.constructor(), e)
              return (t.prevObject = this), t
            },
            each: function (e) {
              return T.each(this, e)
            },
            map: function (e) {
              return this.pushStack(
                T.map(this, function (t, n) {
                  return e.call(t, n, t)
                }),
              )
            },
            slice: function () {
              return this.pushStack(a.apply(this, arguments))
            },
            first: function () {
              return this.eq(0)
            },
            last: function () {
              return this.eq(-1)
            },
            even: function () {
              return this.pushStack(
                T.grep(this, function (e, t) {
                  return (t + 1) % 2
                }),
              )
            },
            odd: function () {
              return this.pushStack(
                T.grep(this, function (e, t) {
                  return t % 2
                }),
              )
            },
            eq: function (e) {
              var t = this.length,
                n = +e + (e < 0 ? t : 0)
              return this.pushStack(n >= 0 && n < t ? [this[n]] : [])
            },
            end: function () {
              return this.prevObject || this.constructor()
            },
            push: c,
            sort: o.sort,
            splice: o.splice,
          }),
            (T.extend = T.fn.extend = function () {
              var e,
                t,
                n,
                i,
                r,
                o,
                s = arguments[0] || {},
                a = 1,
                l = arguments.length,
                c = !1
              for (
                'boolean' == typeof s &&
                  ((c = s), (s = arguments[a] || {}), a++),
                  'object' == typeof s || v(s) || (s = {}),
                  a === l && ((s = this), a--);
                a < l;
                a++
              )
                if (null != (e = arguments[a]))
                  for (t in e)
                    (i = e[t]),
                      '__proto__' !== t &&
                        s !== i &&
                        (c &&
                        i &&
                        (T.isPlainObject(i) || (r = Array.isArray(i)))
                          ? ((n = s[t]),
                            (o =
                              r && !Array.isArray(n)
                                ? []
                                : r || T.isPlainObject(n)
                                ? n
                                : {}),
                            (r = !1),
                            (s[t] = T.extend(c, o, i)))
                          : void 0 !== i && (s[t] = i))
              return s
            }),
            T.extend({
              expando: 'jQuery' + (E + Math.random()).replace(/\D/g, ''),
              isReady: !0,
              error: function (e) {
                throw new Error(e)
              },
              noop: function () {},
              isPlainObject: function (e) {
                var t, n
                return !(
                  !e ||
                  '[object Object]' !== f.call(e) ||
                  ((t = s(e)) &&
                    ('function' !=
                      typeof (n = p.call(t, 'constructor') && t.constructor) ||
                      h.call(n) !== g))
                )
              },
              isEmptyObject: function (e) {
                var t
                for (t in e) return !1
                return !0
              },
              globalEval: function (e, t, n) {
                w(e, { nonce: t && t.nonce }, n)
              },
              each: function (e, t) {
                var n,
                  i = 0
                if (C(e))
                  for (
                    n = e.length;
                    i < n && !1 !== t.call(e[i], i, e[i]);
                    i++
                  );
                else for (i in e) if (!1 === t.call(e[i], i, e[i])) break
                return e
              },
              makeArray: function (e, t) {
                var n = t || []
                return (
                  null != e &&
                    (C(Object(e))
                      ? T.merge(n, 'string' == typeof e ? [e] : e)
                      : c.call(n, e)),
                  n
                )
              },
              inArray: function (e, t, n) {
                return null == t ? -1 : u.call(t, e, n)
              },
              merge: function (e, t) {
                for (var n = +t.length, i = 0, r = e.length; i < n; i++)
                  e[r++] = t[i]
                return (e.length = r), e
              },
              grep: function (e, t, n) {
                for (var i = [], r = 0, o = e.length, s = !n; r < o; r++)
                  !t(e[r], r) !== s && i.push(e[r])
                return i
              },
              map: function (e, t, n) {
                var i,
                  r,
                  o = 0,
                  s = []
                if (C(e))
                  for (i = e.length; o < i; o++)
                    null != (r = t(e[o], o, n)) && s.push(r)
                else for (o in e) null != (r = t(e[o], o, n)) && s.push(r)
                return l(s)
              },
              guid: 1,
              support: m,
            }),
            'function' == typeof Symbol &&
              (T.fn[Symbol.iterator] = o[Symbol.iterator]),
            T.each(
              'Boolean Number String Function Array Date RegExp Object Error Symbol'.split(
                ' ',
              ),
              function (e, t) {
                d['[object ' + t + ']'] = t.toLowerCase()
              },
            )
          var A = (function (e) {
            var t,
              n,
              i,
              r,
              o,
              s,
              a,
              l,
              c,
              u,
              d,
              f,
              p,
              h,
              g,
              m,
              v,
              y,
              b,
              _ = 'sizzle' + 1 * new Date(),
              w = e.document,
              x = 0,
              E = 0,
              T = le(),
              C = le(),
              A = le(),
              k = le(),
              S = function (e, t) {
                return e === t && (d = !0), 0
              },
              O = {}.hasOwnProperty,
              D = [],
              N = D.pop,
              L = D.push,
              j = D.push,
              $ = D.slice,
              P = function (e, t) {
                for (var n = 0, i = e.length; n < i; n++)
                  if (e[n] === t) return n
                return -1
              },
              I =
                'checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped',
              H = '[\\x20\\t\\r\\n\\f]',
              M =
                '(?:\\\\[\\da-fA-F]{1,6}[\\x20\\t\\r\\n\\f]?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+',
              q =
                '\\[[\\x20\\t\\r\\n\\f]*(' +
                M +
                ')(?:' +
                H +
                '*([*^$|!~]?=)' +
                H +
                '*(?:\'((?:\\\\.|[^\\\\\'])*)\'|"((?:\\\\.|[^\\\\"])*)"|(' +
                M +
                '))|)' +
                H +
                '*\\]',
              R =
                ':(' +
                M +
                ')(?:\\(((\'((?:\\\\.|[^\\\\\'])*)\'|"((?:\\\\.|[^\\\\"])*)")|((?:\\\\.|[^\\\\()[\\]]|' +
                q +
                ')*)|.*)\\)|)',
              B = new RegExp(H + '+', 'g'),
              W = new RegExp(
                '^[\\x20\\t\\r\\n\\f]+|((?:^|[^\\\\])(?:\\\\.)*)[\\x20\\t\\r\\n\\f]+$',
                'g',
              ),
              F = new RegExp('^[\\x20\\t\\r\\n\\f]*,[\\x20\\t\\r\\n\\f]*'),
              z = new RegExp(
                '^[\\x20\\t\\r\\n\\f]*([>+~]|[\\x20\\t\\r\\n\\f])[\\x20\\t\\r\\n\\f]*',
              ),
              U = new RegExp(H + '|>'),
              V = new RegExp(R),
              X = new RegExp('^' + M + '$'),
              Y = {
                ID: new RegExp('^#(' + M + ')'),
                CLASS: new RegExp('^\\.(' + M + ')'),
                TAG: new RegExp('^(' + M + '|[*])'),
                ATTR: new RegExp('^' + q),
                PSEUDO: new RegExp('^' + R),
                CHILD: new RegExp(
                  '^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\([\\x20\\t\\r\\n\\f]*(even|odd|(([+-]|)(\\d*)n|)[\\x20\\t\\r\\n\\f]*(?:([+-]|)[\\x20\\t\\r\\n\\f]*(\\d+)|))[\\x20\\t\\r\\n\\f]*\\)|)',
                  'i',
                ),
                bool: new RegExp('^(?:' + I + ')$', 'i'),
                needsContext: new RegExp(
                  '^[\\x20\\t\\r\\n\\f]*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\([\\x20\\t\\r\\n\\f]*((?:-\\d)?\\d*)[\\x20\\t\\r\\n\\f]*\\)|)(?=[^-]|$)',
                  'i',
                ),
              },
              K = /HTML$/i,
              Q = /^(?:input|select|textarea|button)$/i,
              J = /^h\d$/i,
              G = /^[^{]+\{\s*\[native \w/,
              Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
              ee = /[+~]/,
              te = new RegExp(
                '\\\\[\\da-fA-F]{1,6}[\\x20\\t\\r\\n\\f]?|\\\\([^\\r\\n\\f])',
                'g',
              ),
              ne = function (e, t) {
                var n = '0x' + e.slice(1) - 65536
                return (
                  t ||
                  (n < 0
                    ? String.fromCharCode(n + 65536)
                    : String.fromCharCode(
                        (n >> 10) | 55296,
                        (1023 & n) | 56320,
                      ))
                )
              },
              ie = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
              re = function (e, t) {
                return t
                  ? '\0' === e
                    ? '�'
                    : e.slice(0, -1) +
                      '\\' +
                      e.charCodeAt(e.length - 1).toString(16) +
                      ' '
                  : '\\' + e
              },
              oe = function () {
                f()
              },
              se = _e(
                function (e) {
                  return (
                    !0 === e.disabled && 'fieldset' === e.nodeName.toLowerCase()
                  )
                },
                { dir: 'parentNode', next: 'legend' },
              )
            try {
              j.apply((D = $.call(w.childNodes)), w.childNodes),
                D[w.childNodes.length].nodeType
            } catch (e) {
              j = {
                apply: D.length
                  ? function (e, t) {
                      L.apply(e, $.call(t))
                    }
                  : function (e, t) {
                      for (var n = e.length, i = 0; (e[n++] = t[i++]); );
                      e.length = n - 1
                    },
              }
            }
            function ae(e, t, i, r) {
              var o,
                a,
                c,
                u,
                d,
                h,
                v,
                y = t && t.ownerDocument,
                w = t ? t.nodeType : 9
              if (
                ((i = i || []),
                'string' != typeof e || !e || (1 !== w && 9 !== w && 11 !== w))
              )
                return i
              if (!r && (f(t), (t = t || p), g)) {
                if (11 !== w && (d = Z.exec(e)))
                  if ((o = d[1])) {
                    if (9 === w) {
                      if (!(c = t.getElementById(o))) return i
                      if (c.id === o) return i.push(c), i
                    } else if (
                      y &&
                      (c = y.getElementById(o)) &&
                      b(t, c) &&
                      c.id === o
                    )
                      return i.push(c), i
                  } else {
                    if (d[2]) return j.apply(i, t.getElementsByTagName(e)), i
                    if (
                      (o = d[3]) &&
                      n.getElementsByClassName &&
                      t.getElementsByClassName
                    )
                      return j.apply(i, t.getElementsByClassName(o)), i
                  }
                if (
                  n.qsa &&
                  !k[e + ' '] &&
                  (!m || !m.test(e)) &&
                  (1 !== w || 'object' !== t.nodeName.toLowerCase())
                ) {
                  if (((v = e), (y = t), 1 === w && (U.test(e) || z.test(e)))) {
                    for (
                      ((y = (ee.test(e) && ve(t.parentNode)) || t) === t &&
                        n.scope) ||
                        ((u = t.getAttribute('id'))
                          ? (u = u.replace(ie, re))
                          : t.setAttribute('id', (u = _))),
                        a = (h = s(e)).length;
                      a--;

                    )
                      h[a] = (u ? '#' + u : ':scope') + ' ' + be(h[a])
                    v = h.join(',')
                  }
                  try {
                    return j.apply(i, y.querySelectorAll(v)), i
                  } catch (t) {
                    k(e, !0)
                  } finally {
                    u === _ && t.removeAttribute('id')
                  }
                }
              }
              return l(e.replace(W, '$1'), t, i, r)
            }
            function le() {
              var e = []
              return function t(n, r) {
                return (
                  e.push(n + ' ') > i.cacheLength && delete t[e.shift()],
                  (t[n + ' '] = r)
                )
              }
            }
            function ce(e) {
              return (e[_] = !0), e
            }
            function ue(e) {
              var t = p.createElement('fieldset')
              try {
                return !!e(t)
              } catch (e) {
                return !1
              } finally {
                t.parentNode && t.parentNode.removeChild(t), (t = null)
              }
            }
            function de(e, t) {
              for (var n = e.split('|'), r = n.length; r--; )
                i.attrHandle[n[r]] = t
            }
            function fe(e, t) {
              var n = t && e,
                i =
                  n &&
                  1 === e.nodeType &&
                  1 === t.nodeType &&
                  e.sourceIndex - t.sourceIndex
              if (i) return i
              if (n) for (; (n = n.nextSibling); ) if (n === t) return -1
              return e ? 1 : -1
            }
            function pe(e) {
              return function (t) {
                return 'input' === t.nodeName.toLowerCase() && t.type === e
              }
            }
            function he(e) {
              return function (t) {
                var n = t.nodeName.toLowerCase()
                return ('input' === n || 'button' === n) && t.type === e
              }
            }
            function ge(e) {
              return function (t) {
                return 'form' in t
                  ? t.parentNode && !1 === t.disabled
                    ? 'label' in t
                      ? 'label' in t.parentNode
                        ? t.parentNode.disabled === e
                        : t.disabled === e
                      : t.isDisabled === e ||
                        (t.isDisabled !== !e && se(t) === e)
                    : t.disabled === e
                  : 'label' in t && t.disabled === e
              }
            }
            function me(e) {
              return ce(function (t) {
                return (
                  (t = +t),
                  ce(function (n, i) {
                    for (var r, o = e([], n.length, t), s = o.length; s--; )
                      n[(r = o[s])] && (n[r] = !(i[r] = n[r]))
                  })
                )
              })
            }
            function ve(e) {
              return e && void 0 !== e.getElementsByTagName && e
            }
            for (t in ((n = ae.support = {}),
            (o = ae.isXML = function (e) {
              var t = e && e.namespaceURI,
                n = e && (e.ownerDocument || e).documentElement
              return !K.test(t || (n && n.nodeName) || 'HTML')
            }),
            (f = ae.setDocument = function (e) {
              var t,
                r,
                s = e ? e.ownerDocument || e : w
              return s != p && 9 === s.nodeType && s.documentElement
                ? ((h = (p = s).documentElement),
                  (g = !o(p)),
                  w != p &&
                    (r = p.defaultView) &&
                    r.top !== r &&
                    (r.addEventListener
                      ? r.addEventListener('unload', oe, !1)
                      : r.attachEvent && r.attachEvent('onunload', oe)),
                  (n.scope = ue(function (e) {
                    return (
                      h.appendChild(e).appendChild(p.createElement('div')),
                      void 0 !== e.querySelectorAll &&
                        !e.querySelectorAll(':scope fieldset div').length
                    )
                  })),
                  (n.attributes = ue(function (e) {
                    return (e.className = 'i'), !e.getAttribute('className')
                  })),
                  (n.getElementsByTagName = ue(function (e) {
                    return (
                      e.appendChild(p.createComment('')),
                      !e.getElementsByTagName('*').length
                    )
                  })),
                  (n.getElementsByClassName = G.test(p.getElementsByClassName)),
                  (n.getById = ue(function (e) {
                    return (
                      (h.appendChild(e).id = _),
                      !p.getElementsByName || !p.getElementsByName(_).length
                    )
                  })),
                  n.getById
                    ? ((i.filter.ID = function (e) {
                        var t = e.replace(te, ne)
                        return function (e) {
                          return e.getAttribute('id') === t
                        }
                      }),
                      (i.find.ID = function (e, t) {
                        if (void 0 !== t.getElementById && g) {
                          var n = t.getElementById(e)
                          return n ? [n] : []
                        }
                      }))
                    : ((i.filter.ID = function (e) {
                        var t = e.replace(te, ne)
                        return function (e) {
                          var n =
                            void 0 !== e.getAttributeNode &&
                            e.getAttributeNode('id')
                          return n && n.value === t
                        }
                      }),
                      (i.find.ID = function (e, t) {
                        if (void 0 !== t.getElementById && g) {
                          var n,
                            i,
                            r,
                            o = t.getElementById(e)
                          if (o) {
                            if ((n = o.getAttributeNode('id')) && n.value === e)
                              return [o]
                            for (
                              r = t.getElementsByName(e), i = 0;
                              (o = r[i++]);

                            )
                              if (
                                (n = o.getAttributeNode('id')) &&
                                n.value === e
                              )
                                return [o]
                          }
                          return []
                        }
                      })),
                  (i.find.TAG = n.getElementsByTagName
                    ? function (e, t) {
                        return void 0 !== t.getElementsByTagName
                          ? t.getElementsByTagName(e)
                          : n.qsa
                          ? t.querySelectorAll(e)
                          : void 0
                      }
                    : function (e, t) {
                        var n,
                          i = [],
                          r = 0,
                          o = t.getElementsByTagName(e)
                        if ('*' === e) {
                          for (; (n = o[r++]); ) 1 === n.nodeType && i.push(n)
                          return i
                        }
                        return o
                      }),
                  (i.find.CLASS =
                    n.getElementsByClassName &&
                    function (e, t) {
                      if (void 0 !== t.getElementsByClassName && g)
                        return t.getElementsByClassName(e)
                    }),
                  (v = []),
                  (m = []),
                  (n.qsa = G.test(p.querySelectorAll)) &&
                    (ue(function (e) {
                      var t
                      ;(h.appendChild(e).innerHTML =
                        "<a id='" +
                        _ +
                        "'></a><select id='" +
                        _ +
                        "-\r\\' msallowcapture=''><option selected=''></option></select>"),
                        e.querySelectorAll("[msallowcapture^='']").length &&
                          m.push('[*^$]=[\\x20\\t\\r\\n\\f]*(?:\'\'|"")'),
                        e.querySelectorAll('[selected]').length ||
                          m.push('\\[[\\x20\\t\\r\\n\\f]*(?:value|' + I + ')'),
                        e.querySelectorAll('[id~=' + _ + '-]').length ||
                          m.push('~='),
                        (t = p.createElement('input')).setAttribute('name', ''),
                        e.appendChild(t),
                        e.querySelectorAll("[name='']").length ||
                          m.push(
                            '\\[[\\x20\\t\\r\\n\\f]*name[\\x20\\t\\r\\n\\f]*=[\\x20\\t\\r\\n\\f]*(?:\'\'|"")',
                          ),
                        e.querySelectorAll(':checked').length ||
                          m.push(':checked'),
                        e.querySelectorAll('a#' + _ + '+*').length ||
                          m.push('.#.+[+~]'),
                        e.querySelectorAll('\\\f'),
                        m.push('[\\r\\n\\f]')
                    }),
                    ue(function (e) {
                      e.innerHTML =
                        "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>"
                      var t = p.createElement('input')
                      t.setAttribute('type', 'hidden'),
                        e.appendChild(t).setAttribute('name', 'D'),
                        e.querySelectorAll('[name=d]').length &&
                          m.push('name[\\x20\\t\\r\\n\\f]*[*^$|!~]?='),
                        2 !== e.querySelectorAll(':enabled').length &&
                          m.push(':enabled', ':disabled'),
                        (h.appendChild(e).disabled = !0),
                        2 !== e.querySelectorAll(':disabled').length &&
                          m.push(':enabled', ':disabled'),
                        e.querySelectorAll('*,:x'),
                        m.push(',.*:')
                    })),
                  (n.matchesSelector = G.test(
                    (y =
                      h.matches ||
                      h.webkitMatchesSelector ||
                      h.mozMatchesSelector ||
                      h.oMatchesSelector ||
                      h.msMatchesSelector),
                  )) &&
                    ue(function (e) {
                      ;(n.disconnectedMatch = y.call(e, '*')),
                        y.call(e, "[s!='']:x"),
                        v.push('!=', R)
                    }),
                  (m = m.length && new RegExp(m.join('|'))),
                  (v = v.length && new RegExp(v.join('|'))),
                  (t = G.test(h.compareDocumentPosition)),
                  (b =
                    t || G.test(h.contains)
                      ? function (e, t) {
                          var n = 9 === e.nodeType ? e.documentElement : e,
                            i = t && t.parentNode
                          return (
                            e === i ||
                            !(
                              !i ||
                              1 !== i.nodeType ||
                              !(n.contains
                                ? n.contains(i)
                                : e.compareDocumentPosition &&
                                  16 & e.compareDocumentPosition(i))
                            )
                          )
                        }
                      : function (e, t) {
                          if (t)
                            for (; (t = t.parentNode); ) if (t === e) return !0
                          return !1
                        }),
                  (S = t
                    ? function (e, t) {
                        if (e === t) return (d = !0), 0
                        var i =
                          !e.compareDocumentPosition -
                          !t.compareDocumentPosition
                        return (
                          i ||
                          (1 &
                            (i =
                              (e.ownerDocument || e) == (t.ownerDocument || t)
                                ? e.compareDocumentPosition(t)
                                : 1) ||
                          (!n.sortDetached &&
                            t.compareDocumentPosition(e) === i)
                            ? e == p || (e.ownerDocument == w && b(w, e))
                              ? -1
                              : t == p || (t.ownerDocument == w && b(w, t))
                              ? 1
                              : u
                              ? P(u, e) - P(u, t)
                              : 0
                            : 4 & i
                            ? -1
                            : 1)
                        )
                      }
                    : function (e, t) {
                        if (e === t) return (d = !0), 0
                        var n,
                          i = 0,
                          r = e.parentNode,
                          o = t.parentNode,
                          s = [e],
                          a = [t]
                        if (!r || !o)
                          return e == p
                            ? -1
                            : t == p
                            ? 1
                            : r
                            ? -1
                            : o
                            ? 1
                            : u
                            ? P(u, e) - P(u, t)
                            : 0
                        if (r === o) return fe(e, t)
                        for (n = e; (n = n.parentNode); ) s.unshift(n)
                        for (n = t; (n = n.parentNode); ) a.unshift(n)
                        for (; s[i] === a[i]; ) i++
                        return i
                          ? fe(s[i], a[i])
                          : s[i] == w
                          ? -1
                          : a[i] == w
                          ? 1
                          : 0
                      }),
                  p)
                : p
            }),
            (ae.matches = function (e, t) {
              return ae(e, null, null, t)
            }),
            (ae.matchesSelector = function (e, t) {
              if (
                (f(e),
                n.matchesSelector &&
                  g &&
                  !k[t + ' '] &&
                  (!v || !v.test(t)) &&
                  (!m || !m.test(t)))
              )
                try {
                  var i = y.call(e, t)
                  if (
                    i ||
                    n.disconnectedMatch ||
                    (e.document && 11 !== e.document.nodeType)
                  )
                    return i
                } catch (e) {
                  k(t, !0)
                }
              return ae(t, p, null, [e]).length > 0
            }),
            (ae.contains = function (e, t) {
              return (e.ownerDocument || e) != p && f(e), b(e, t)
            }),
            (ae.attr = function (e, t) {
              ;(e.ownerDocument || e) != p && f(e)
              var r = i.attrHandle[t.toLowerCase()],
                o =
                  r && O.call(i.attrHandle, t.toLowerCase())
                    ? r(e, t, !g)
                    : void 0
              return void 0 !== o
                ? o
                : n.attributes || !g
                ? e.getAttribute(t)
                : (o = e.getAttributeNode(t)) && o.specified
                ? o.value
                : null
            }),
            (ae.escape = function (e) {
              return (e + '').replace(ie, re)
            }),
            (ae.error = function (e) {
              throw new Error('Syntax error, unrecognized expression: ' + e)
            }),
            (ae.uniqueSort = function (e) {
              var t,
                i = [],
                r = 0,
                o = 0
              if (
                ((d = !n.detectDuplicates),
                (u = !n.sortStable && e.slice(0)),
                e.sort(S),
                d)
              ) {
                for (; (t = e[o++]); ) t === e[o] && (r = i.push(o))
                for (; r--; ) e.splice(i[r], 1)
              }
              return (u = null), e
            }),
            (r = ae.getText = function (e) {
              var t,
                n = '',
                i = 0,
                o = e.nodeType
              if (o) {
                if (1 === o || 9 === o || 11 === o) {
                  if ('string' == typeof e.textContent) return e.textContent
                  for (e = e.firstChild; e; e = e.nextSibling) n += r(e)
                } else if (3 === o || 4 === o) return e.nodeValue
              } else for (; (t = e[i++]); ) n += r(t)
              return n
            }),
            (i = ae.selectors = {
              cacheLength: 50,
              createPseudo: ce,
              match: Y,
              attrHandle: {},
              find: {},
              relative: {
                '>': { dir: 'parentNode', first: !0 },
                ' ': { dir: 'parentNode' },
                '+': { dir: 'previousSibling', first: !0 },
                '~': { dir: 'previousSibling' },
              },
              preFilter: {
                ATTR: function (e) {
                  return (
                    (e[1] = e[1].replace(te, ne)),
                    (e[3] = (e[3] || e[4] || e[5] || '').replace(te, ne)),
                    '~=' === e[2] && (e[3] = ' ' + e[3] + ' '),
                    e.slice(0, 4)
                  )
                },
                CHILD: function (e) {
                  return (
                    (e[1] = e[1].toLowerCase()),
                    'nth' === e[1].slice(0, 3)
                      ? (e[3] || ae.error(e[0]),
                        (e[4] = +(e[4]
                          ? e[5] + (e[6] || 1)
                          : 2 * ('even' === e[3] || 'odd' === e[3]))),
                        (e[5] = +(e[7] + e[8] || 'odd' === e[3])))
                      : e[3] && ae.error(e[0]),
                    e
                  )
                },
                PSEUDO: function (e) {
                  var t,
                    n = !e[6] && e[2]
                  return Y.CHILD.test(e[0])
                    ? null
                    : (e[3]
                        ? (e[2] = e[4] || e[5] || '')
                        : n &&
                          V.test(n) &&
                          (t = s(n, !0)) &&
                          (t = n.indexOf(')', n.length - t) - n.length) &&
                          ((e[0] = e[0].slice(0, t)), (e[2] = n.slice(0, t))),
                      e.slice(0, 3))
                },
              },
              filter: {
                TAG: function (e) {
                  var t = e.replace(te, ne).toLowerCase()
                  return '*' === e
                    ? function () {
                        return !0
                      }
                    : function (e) {
                        return e.nodeName && e.nodeName.toLowerCase() === t
                      }
                },
                CLASS: function (e) {
                  var t = T[e + ' ']
                  return (
                    t ||
                    ((t = new RegExp(
                      '(^|[\\x20\\t\\r\\n\\f])' + e + '(' + H + '|$)',
                    )) &&
                      T(e, function (e) {
                        return t.test(
                          ('string' == typeof e.className && e.className) ||
                            (void 0 !== e.getAttribute &&
                              e.getAttribute('class')) ||
                            '',
                        )
                      }))
                  )
                },
                ATTR: function (e, t, n) {
                  return function (i) {
                    var r = ae.attr(i, e)
                    return null == r
                      ? '!=' === t
                      : !t ||
                          ((r += ''),
                          '=' === t
                            ? r === n
                            : '!=' === t
                            ? r !== n
                            : '^=' === t
                            ? n && 0 === r.indexOf(n)
                            : '*=' === t
                            ? n && r.indexOf(n) > -1
                            : '$=' === t
                            ? n && r.slice(-n.length) === n
                            : '~=' === t
                            ? (' ' + r.replace(B, ' ') + ' ').indexOf(n) > -1
                            : '|=' === t &&
                              (r === n || r.slice(0, n.length + 1) === n + '-'))
                  }
                },
                CHILD: function (e, t, n, i, r) {
                  var o = 'nth' !== e.slice(0, 3),
                    s = 'last' !== e.slice(-4),
                    a = 'of-type' === t
                  return 1 === i && 0 === r
                    ? function (e) {
                        return !!e.parentNode
                      }
                    : function (t, n, l) {
                        var c,
                          u,
                          d,
                          f,
                          p,
                          h,
                          g = o !== s ? 'nextSibling' : 'previousSibling',
                          m = t.parentNode,
                          v = a && t.nodeName.toLowerCase(),
                          y = !l && !a,
                          b = !1
                        if (m) {
                          if (o) {
                            for (; g; ) {
                              for (f = t; (f = f[g]); )
                                if (
                                  a
                                    ? f.nodeName.toLowerCase() === v
                                    : 1 === f.nodeType
                                )
                                  return !1
                              h = g = 'only' === e && !h && 'nextSibling'
                            }
                            return !0
                          }
                          if (
                            ((h = [s ? m.firstChild : m.lastChild]), s && y)
                          ) {
                            for (
                              b =
                                (p =
                                  (c =
                                    (u =
                                      (d = (f = m)[_] || (f[_] = {}))[
                                        f.uniqueID
                                      ] || (d[f.uniqueID] = {}))[e] ||
                                    [])[0] === x && c[1]) && c[2],
                                f = p && m.childNodes[p];
                              (f =
                                (++p && f && f[g]) || (b = p = 0) || h.pop());

                            )
                              if (1 === f.nodeType && ++b && f === t) {
                                u[e] = [x, p, b]
                                break
                              }
                          } else if (
                            (y &&
                              (b = p =
                                (c =
                                  (u =
                                    (d = (f = t)[_] || (f[_] = {}))[
                                      f.uniqueID
                                    ] || (d[f.uniqueID] = {}))[e] || [])[0] ===
                                  x && c[1]),
                            !1 === b)
                          )
                            for (
                              ;
                              (f =
                                (++p && f && f[g]) || (b = p = 0) || h.pop()) &&
                              ((a
                                ? f.nodeName.toLowerCase() !== v
                                : 1 !== f.nodeType) ||
                                !++b ||
                                (y &&
                                  ((u =
                                    (d = f[_] || (f[_] = {}))[f.uniqueID] ||
                                    (d[f.uniqueID] = {}))[e] = [x, b]),
                                f !== t));

                            );
                          return (b -= r) === i || (b % i == 0 && b / i >= 0)
                        }
                      }
                },
                PSEUDO: function (e, t) {
                  var n,
                    r =
                      i.pseudos[e] ||
                      i.setFilters[e.toLowerCase()] ||
                      ae.error('unsupported pseudo: ' + e)
                  return r[_]
                    ? r(t)
                    : r.length > 1
                    ? ((n = [e, e, '', t]),
                      i.setFilters.hasOwnProperty(e.toLowerCase())
                        ? ce(function (e, n) {
                            for (var i, o = r(e, t), s = o.length; s--; )
                              e[(i = P(e, o[s]))] = !(n[i] = o[s])
                          })
                        : function (e) {
                            return r(e, 0, n)
                          })
                    : r
                },
              },
              pseudos: {
                not: ce(function (e) {
                  var t = [],
                    n = [],
                    i = a(e.replace(W, '$1'))
                  return i[_]
                    ? ce(function (e, t, n, r) {
                        for (var o, s = i(e, null, r, []), a = e.length; a--; )
                          (o = s[a]) && (e[a] = !(t[a] = o))
                      })
                    : function (e, r, o) {
                        return (
                          (t[0] = e), i(t, null, o, n), (t[0] = null), !n.pop()
                        )
                      }
                }),
                has: ce(function (e) {
                  return function (t) {
                    return ae(e, t).length > 0
                  }
                }),
                contains: ce(function (e) {
                  return (
                    (e = e.replace(te, ne)),
                    function (t) {
                      return (t.textContent || r(t)).indexOf(e) > -1
                    }
                  )
                }),
                lang: ce(function (e) {
                  return (
                    X.test(e || '') || ae.error('unsupported lang: ' + e),
                    (e = e.replace(te, ne).toLowerCase()),
                    function (t) {
                      var n
                      do {
                        if (
                          (n = g
                            ? t.lang
                            : t.getAttribute('xml:lang') ||
                              t.getAttribute('lang'))
                        )
                          return (
                            (n = n.toLowerCase()) === e ||
                            0 === n.indexOf(e + '-')
                          )
                      } while ((t = t.parentNode) && 1 === t.nodeType)
                      return !1
                    }
                  )
                }),
                target: function (t) {
                  var n = e.location && e.location.hash
                  return n && n.slice(1) === t.id
                },
                root: function (e) {
                  return e === h
                },
                focus: function (e) {
                  return (
                    e === p.activeElement &&
                    (!p.hasFocus || p.hasFocus()) &&
                    !!(e.type || e.href || ~e.tabIndex)
                  )
                },
                enabled: ge(!1),
                disabled: ge(!0),
                checked: function (e) {
                  var t = e.nodeName.toLowerCase()
                  return (
                    ('input' === t && !!e.checked) ||
                    ('option' === t && !!e.selected)
                  )
                },
                selected: function (e) {
                  return (
                    e.parentNode && e.parentNode.selectedIndex,
                    !0 === e.selected
                  )
                },
                empty: function (e) {
                  for (e = e.firstChild; e; e = e.nextSibling)
                    if (e.nodeType < 6) return !1
                  return !0
                },
                parent: function (e) {
                  return !i.pseudos.empty(e)
                },
                header: function (e) {
                  return J.test(e.nodeName)
                },
                input: function (e) {
                  return Q.test(e.nodeName)
                },
                button: function (e) {
                  var t = e.nodeName.toLowerCase()
                  return (
                    ('input' === t && 'button' === e.type) || 'button' === t
                  )
                },
                text: function (e) {
                  var t
                  return (
                    'input' === e.nodeName.toLowerCase() &&
                    'text' === e.type &&
                    (null == (t = e.getAttribute('type')) ||
                      'text' === t.toLowerCase())
                  )
                },
                first: me(function () {
                  return [0]
                }),
                last: me(function (e, t) {
                  return [t - 1]
                }),
                eq: me(function (e, t, n) {
                  return [n < 0 ? n + t : n]
                }),
                even: me(function (e, t) {
                  for (var n = 0; n < t; n += 2) e.push(n)
                  return e
                }),
                odd: me(function (e, t) {
                  for (var n = 1; n < t; n += 2) e.push(n)
                  return e
                }),
                lt: me(function (e, t, n) {
                  for (var i = n < 0 ? n + t : n > t ? t : n; --i >= 0; )
                    e.push(i)
                  return e
                }),
                gt: me(function (e, t, n) {
                  for (var i = n < 0 ? n + t : n; ++i < t; ) e.push(i)
                  return e
                }),
              },
            }),
            (i.pseudos.nth = i.pseudos.eq),
            { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }))
              i.pseudos[t] = pe(t)
            for (t in { submit: !0, reset: !0 }) i.pseudos[t] = he(t)
            function ye() {}
            function be(e) {
              for (var t = 0, n = e.length, i = ''; t < n; t++) i += e[t].value
              return i
            }
            function _e(e, t, n) {
              var i = t.dir,
                r = t.next,
                o = r || i,
                s = n && 'parentNode' === o,
                a = E++
              return t.first
                ? function (t, n, r) {
                    for (; (t = t[i]); )
                      if (1 === t.nodeType || s) return e(t, n, r)
                    return !1
                  }
                : function (t, n, l) {
                    var c,
                      u,
                      d,
                      f = [x, a]
                    if (l) {
                      for (; (t = t[i]); )
                        if ((1 === t.nodeType || s) && e(t, n, l)) return !0
                    } else
                      for (; (t = t[i]); )
                        if (1 === t.nodeType || s)
                          if (
                            ((u =
                              (d = t[_] || (t[_] = {}))[t.uniqueID] ||
                              (d[t.uniqueID] = {})),
                            r && r === t.nodeName.toLowerCase())
                          )
                            t = t[i] || t
                          else {
                            if ((c = u[o]) && c[0] === x && c[1] === a)
                              return (f[2] = c[2])
                            if (((u[o] = f), (f[2] = e(t, n, l)))) return !0
                          }
                    return !1
                  }
            }
            function we(e) {
              return e.length > 1
                ? function (t, n, i) {
                    for (var r = e.length; r--; ) if (!e[r](t, n, i)) return !1
                    return !0
                  }
                : e[0]
            }
            function xe(e, t, n, i, r) {
              for (
                var o, s = [], a = 0, l = e.length, c = null != t;
                a < l;
                a++
              )
                (o = e[a]) &&
                  ((n && !n(o, i, r)) || (s.push(o), c && t.push(a)))
              return s
            }
            function Ee(e, t, n, i, r, o) {
              return (
                i && !i[_] && (i = Ee(i)),
                r && !r[_] && (r = Ee(r, o)),
                ce(function (o, s, a, l) {
                  var c,
                    u,
                    d,
                    f = [],
                    p = [],
                    h = s.length,
                    g =
                      o ||
                      (function (e, t, n) {
                        for (var i = 0, r = t.length; i < r; i++) ae(e, t[i], n)
                        return n
                      })(t || '*', a.nodeType ? [a] : a, []),
                    m = !e || (!o && t) ? g : xe(g, f, e, a, l),
                    v = n ? (r || (o ? e : h || i) ? [] : s) : m
                  if ((n && n(m, v, a, l), i))
                    for (c = xe(v, p), i(c, [], a, l), u = c.length; u--; )
                      (d = c[u]) && (v[p[u]] = !(m[p[u]] = d))
                  if (o) {
                    if (r || e) {
                      if (r) {
                        for (c = [], u = v.length; u--; )
                          (d = v[u]) && c.push((m[u] = d))
                        r(null, (v = []), c, l)
                      }
                      for (u = v.length; u--; )
                        (d = v[u]) &&
                          (c = r ? P(o, d) : f[u]) > -1 &&
                          (o[c] = !(s[c] = d))
                    }
                  } else (v = xe(v === s ? v.splice(h, v.length) : v)), r ? r(null, s, v, l) : j.apply(s, v)
                })
              )
            }
            function Te(e) {
              for (
                var t,
                  n,
                  r,
                  o = e.length,
                  s = i.relative[e[0].type],
                  a = s || i.relative[' '],
                  l = s ? 1 : 0,
                  u = _e(
                    function (e) {
                      return e === t
                    },
                    a,
                    !0,
                  ),
                  d = _e(
                    function (e) {
                      return P(t, e) > -1
                    },
                    a,
                    !0,
                  ),
                  f = [
                    function (e, n, i) {
                      var r =
                        (!s && (i || n !== c)) ||
                        ((t = n).nodeType ? u(e, n, i) : d(e, n, i))
                      return (t = null), r
                    },
                  ];
                l < o;
                l++
              )
                if ((n = i.relative[e[l].type])) f = [_e(we(f), n)]
                else {
                  if ((n = i.filter[e[l].type].apply(null, e[l].matches))[_]) {
                    for (r = ++l; r < o && !i.relative[e[r].type]; r++);
                    return Ee(
                      l > 1 && we(f),
                      l > 1 &&
                        be(
                          e
                            .slice(0, l - 1)
                            .concat({
                              value: ' ' === e[l - 2].type ? '*' : '',
                            }),
                        ).replace(W, '$1'),
                      n,
                      l < r && Te(e.slice(l, r)),
                      r < o && Te((e = e.slice(r))),
                      r < o && be(e),
                    )
                  }
                  f.push(n)
                }
              return we(f)
            }
            return (
              (ye.prototype = i.filters = i.pseudos),
              (i.setFilters = new ye()),
              (s = ae.tokenize = function (e, t) {
                var n,
                  r,
                  o,
                  s,
                  a,
                  l,
                  c,
                  u = C[e + ' ']
                if (u) return t ? 0 : u.slice(0)
                for (a = e, l = [], c = i.preFilter; a; ) {
                  for (s in ((n && !(r = F.exec(a))) ||
                    (r && (a = a.slice(r[0].length) || a), l.push((o = []))),
                  (n = !1),
                  (r = z.exec(a)) &&
                    ((n = r.shift()),
                    o.push({ value: n, type: r[0].replace(W, ' ') }),
                    (a = a.slice(n.length))),
                  i.filter))
                    !(r = Y[s].exec(a)) ||
                      (c[s] && !(r = c[s](r))) ||
                      ((n = r.shift()),
                      o.push({ value: n, type: s, matches: r }),
                      (a = a.slice(n.length)))
                  if (!n) break
                }
                return t ? a.length : a ? ae.error(e) : C(e, l).slice(0)
              }),
              (a = ae.compile = function (e, t) {
                var n,
                  r = [],
                  o = [],
                  a = A[e + ' ']
                if (!a) {
                  for (t || (t = s(e)), n = t.length; n--; )
                    (a = Te(t[n]))[_] ? r.push(a) : o.push(a)
                  ;(a = A(
                    e,
                    (function (e, t) {
                      var n = t.length > 0,
                        r = e.length > 0,
                        o = function (o, s, a, l, u) {
                          var d,
                            h,
                            m,
                            v = 0,
                            y = '0',
                            b = o && [],
                            _ = [],
                            w = c,
                            E = o || (r && i.find.TAG('*', u)),
                            T = (x += null == w ? 1 : Math.random() || 0.1),
                            C = E.length
                          for (
                            u && (c = s == p || s || u);
                            y !== C && null != (d = E[y]);
                            y++
                          ) {
                            if (r && d) {
                              for (
                                h = 0,
                                  s || d.ownerDocument == p || (f(d), (a = !g));
                                (m = e[h++]);

                              )
                                if (m(d, s || p, a)) {
                                  l.push(d)
                                  break
                                }
                              u && (x = T)
                            }
                            n && ((d = !m && d) && v--, o && b.push(d))
                          }
                          if (((v += y), n && y !== v)) {
                            for (h = 0; (m = t[h++]); ) m(b, _, s, a)
                            if (o) {
                              if (v > 0)
                                for (; y--; ) b[y] || _[y] || (_[y] = N.call(l))
                              _ = xe(_)
                            }
                            j.apply(l, _),
                              u &&
                                !o &&
                                _.length > 0 &&
                                v + t.length > 1 &&
                                ae.uniqueSort(l)
                          }
                          return u && ((x = T), (c = w)), b
                        }
                      return n ? ce(o) : o
                    })(o, r),
                  )),
                    (a.selector = e)
                }
                return a
              }),
              (l = ae.select = function (e, t, n, r) {
                var o,
                  l,
                  c,
                  u,
                  d,
                  f = 'function' == typeof e && e,
                  p = !r && s((e = f.selector || e))
                if (((n = n || []), 1 === p.length)) {
                  if (
                    (l = p[0] = p[0].slice(0)).length > 2 &&
                    'ID' === (c = l[0]).type &&
                    9 === t.nodeType &&
                    g &&
                    i.relative[l[1].type]
                  ) {
                    if (
                      !(t = (i.find.ID(c.matches[0].replace(te, ne), t) ||
                        [])[0])
                    )
                      return n
                    f && (t = t.parentNode),
                      (e = e.slice(l.shift().value.length))
                  }
                  for (
                    o = Y.needsContext.test(e) ? 0 : l.length;
                    o-- && ((c = l[o]), !i.relative[(u = c.type)]);

                  )
                    if (
                      (d = i.find[u]) &&
                      (r = d(
                        c.matches[0].replace(te, ne),
                        (ee.test(l[0].type) && ve(t.parentNode)) || t,
                      ))
                    ) {
                      if ((l.splice(o, 1), !(e = r.length && be(l))))
                        return j.apply(n, r), n
                      break
                    }
                }
                return (
                  (f || a(e, p))(
                    r,
                    t,
                    !g,
                    n,
                    !t || (ee.test(e) && ve(t.parentNode)) || t,
                  ),
                  n
                )
              }),
              (n.sortStable = _.split('').sort(S).join('') === _),
              (n.detectDuplicates = !!d),
              f(),
              (n.sortDetached = ue(function (e) {
                return (
                  1 & e.compareDocumentPosition(p.createElement('fieldset'))
                )
              })),
              ue(function (e) {
                return (
                  (e.innerHTML = "<a href='#'></a>"),
                  '#' === e.firstChild.getAttribute('href')
                )
              }) ||
                de('type|href|height|width', function (e, t, n) {
                  if (!n)
                    return e.getAttribute(t, 'type' === t.toLowerCase() ? 1 : 2)
                }),
              (n.attributes &&
                ue(function (e) {
                  return (
                    (e.innerHTML = '<input/>'),
                    e.firstChild.setAttribute('value', ''),
                    '' === e.firstChild.getAttribute('value')
                  )
                })) ||
                de('value', function (e, t, n) {
                  if (!n && 'input' === e.nodeName.toLowerCase())
                    return e.defaultValue
                }),
              ue(function (e) {
                return null == e.getAttribute('disabled')
              }) ||
                de(I, function (e, t, n) {
                  var i
                  if (!n)
                    return !0 === e[t]
                      ? t.toLowerCase()
                      : (i = e.getAttributeNode(t)) && i.specified
                      ? i.value
                      : null
                }),
              ae
            )
          })(i)
          ;(T.find = A),
            (T.expr = A.selectors),
            (T.expr[':'] = T.expr.pseudos),
            (T.uniqueSort = T.unique = A.uniqueSort),
            (T.text = A.getText),
            (T.isXMLDoc = A.isXML),
            (T.contains = A.contains),
            (T.escapeSelector = A.escape)
          var k = function (e, t, n) {
              for (
                var i = [], r = void 0 !== n;
                (e = e[t]) && 9 !== e.nodeType;

              )
                if (1 === e.nodeType) {
                  if (r && T(e).is(n)) break
                  i.push(e)
                }
              return i
            },
            S = function (e, t) {
              for (var n = []; e; e = e.nextSibling)
                1 === e.nodeType && e !== t && n.push(e)
              return n
            },
            O = T.expr.match.needsContext
          function D(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
          }
          var N = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i
          function L(e, t, n) {
            return v(t)
              ? T.grep(e, function (e, i) {
                  return !!t.call(e, i, e) !== n
                })
              : t.nodeType
              ? T.grep(e, function (e) {
                  return (e === t) !== n
                })
              : 'string' != typeof t
              ? T.grep(e, function (e) {
                  return u.call(t, e) > -1 !== n
                })
              : T.filter(t, e, n)
          }
          ;(T.filter = function (e, t, n) {
            var i = t[0]
            return (
              n && (e = ':not(' + e + ')'),
              1 === t.length && 1 === i.nodeType
                ? T.find.matchesSelector(i, e)
                  ? [i]
                  : []
                : T.find.matches(
                    e,
                    T.grep(t, function (e) {
                      return 1 === e.nodeType
                    }),
                  )
            )
          }),
            T.fn.extend({
              find: function (e) {
                var t,
                  n,
                  i = this.length,
                  r = this
                if ('string' != typeof e)
                  return this.pushStack(
                    T(e).filter(function () {
                      for (t = 0; t < i; t++)
                        if (T.contains(r[t], this)) return !0
                    }),
                  )
                for (n = this.pushStack([]), t = 0; t < i; t++)
                  T.find(e, r[t], n)
                return i > 1 ? T.uniqueSort(n) : n
              },
              filter: function (e) {
                return this.pushStack(L(this, e || [], !1))
              },
              not: function (e) {
                return this.pushStack(L(this, e || [], !0))
              },
              is: function (e) {
                return !!L(
                  this,
                  'string' == typeof e && O.test(e) ? T(e) : e || [],
                  !1,
                ).length
              },
            })
          var j,
            $ = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/
          ;((T.fn.init = function (e, t, n) {
            var i, r
            if (!e) return this
            if (((n = n || j), 'string' == typeof e)) {
              if (
                !(i =
                  '<' === e[0] && '>' === e[e.length - 1] && e.length >= 3
                    ? [null, e, null]
                    : $.exec(e)) ||
                (!i[1] && t)
              )
                return !t || t.jquery
                  ? (t || n).find(e)
                  : this.constructor(t).find(e)
              if (i[1]) {
                if (
                  ((t = t instanceof T ? t[0] : t),
                  T.merge(
                    this,
                    T.parseHTML(
                      i[1],
                      t && t.nodeType ? t.ownerDocument || t : b,
                      !0,
                    ),
                  ),
                  N.test(i[1]) && T.isPlainObject(t))
                )
                  for (i in t) v(this[i]) ? this[i](t[i]) : this.attr(i, t[i])
                return this
              }
              return (
                (r = b.getElementById(i[2])) &&
                  ((this[0] = r), (this.length = 1)),
                this
              )
            }
            return e.nodeType
              ? ((this[0] = e), (this.length = 1), this)
              : v(e)
              ? void 0 !== n.ready
                ? n.ready(e)
                : e(T)
              : T.makeArray(e, this)
          }).prototype = T.fn),
            (j = T(b))
          var P = /^(?:parents|prev(?:Until|All))/,
            I = { children: !0, contents: !0, next: !0, prev: !0 }
          function H(e, t) {
            for (; (e = e[t]) && 1 !== e.nodeType; );
            return e
          }
          T.fn.extend({
            has: function (e) {
              var t = T(e, this),
                n = t.length
              return this.filter(function () {
                for (var e = 0; e < n; e++)
                  if (T.contains(this, t[e])) return !0
              })
            },
            closest: function (e, t) {
              var n,
                i = 0,
                r = this.length,
                o = [],
                s = 'string' != typeof e && T(e)
              if (!O.test(e))
                for (; i < r; i++)
                  for (n = this[i]; n && n !== t; n = n.parentNode)
                    if (
                      n.nodeType < 11 &&
                      (s
                        ? s.index(n) > -1
                        : 1 === n.nodeType && T.find.matchesSelector(n, e))
                    ) {
                      o.push(n)
                      break
                    }
              return this.pushStack(o.length > 1 ? T.uniqueSort(o) : o)
            },
            index: function (e) {
              return e
                ? 'string' == typeof e
                  ? u.call(T(e), this[0])
                  : u.call(this, e.jquery ? e[0] : e)
                : this[0] && this[0].parentNode
                ? this.first().prevAll().length
                : -1
            },
            add: function (e, t) {
              return this.pushStack(T.uniqueSort(T.merge(this.get(), T(e, t))))
            },
            addBack: function (e) {
              return this.add(
                null == e ? this.prevObject : this.prevObject.filter(e),
              )
            },
          }),
            T.each(
              {
                parent: function (e) {
                  var t = e.parentNode
                  return t && 11 !== t.nodeType ? t : null
                },
                parents: function (e) {
                  return k(e, 'parentNode')
                },
                parentsUntil: function (e, t, n) {
                  return k(e, 'parentNode', n)
                },
                next: function (e) {
                  return H(e, 'nextSibling')
                },
                prev: function (e) {
                  return H(e, 'previousSibling')
                },
                nextAll: function (e) {
                  return k(e, 'nextSibling')
                },
                prevAll: function (e) {
                  return k(e, 'previousSibling')
                },
                nextUntil: function (e, t, n) {
                  return k(e, 'nextSibling', n)
                },
                prevUntil: function (e, t, n) {
                  return k(e, 'previousSibling', n)
                },
                siblings: function (e) {
                  return S((e.parentNode || {}).firstChild, e)
                },
                children: function (e) {
                  return S(e.firstChild)
                },
                contents: function (e) {
                  return null != e.contentDocument && s(e.contentDocument)
                    ? e.contentDocument
                    : (D(e, 'template') && (e = e.content || e),
                      T.merge([], e.childNodes))
                },
              },
              function (e, t) {
                T.fn[e] = function (n, i) {
                  var r = T.map(this, t, n)
                  return (
                    'Until' !== e.slice(-5) && (i = n),
                    i && 'string' == typeof i && (r = T.filter(i, r)),
                    this.length > 1 &&
                      (I[e] || T.uniqueSort(r), P.test(e) && r.reverse()),
                    this.pushStack(r)
                  )
                }
              },
            )
          var M = /[^\x20\t\r\n\f]+/g
          function q(e) {
            return e
          }
          function R(e) {
            throw e
          }
          function B(e, t, n, i) {
            var r
            try {
              e && v((r = e.promise))
                ? r.call(e).done(t).fail(n)
                : e && v((r = e.then))
                ? r.call(e, t, n)
                : t.apply(void 0, [e].slice(i))
            } catch (e) {
              n.apply(void 0, [e])
            }
          }
          ;(T.Callbacks = function (e) {
            e =
              'string' == typeof e
                ? (function (e) {
                    var t = {}
                    return (
                      T.each(e.match(M) || [], function (e, n) {
                        t[n] = !0
                      }),
                      t
                    )
                  })(e)
                : T.extend({}, e)
            var t,
              n,
              i,
              r,
              o = [],
              s = [],
              a = -1,
              l = function () {
                for (r = r || e.once, i = t = !0; s.length; a = -1)
                  for (n = s.shift(); ++a < o.length; )
                    !1 === o[a].apply(n[0], n[1]) &&
                      e.stopOnFalse &&
                      ((a = o.length), (n = !1))
                e.memory || (n = !1), (t = !1), r && (o = n ? [] : '')
              },
              c = {
                add: function () {
                  return (
                    o &&
                      (n && !t && ((a = o.length - 1), s.push(n)),
                      (function t(n) {
                        T.each(n, function (n, i) {
                          v(i)
                            ? (e.unique && c.has(i)) || o.push(i)
                            : i && i.length && 'string' !== x(i) && t(i)
                        })
                      })(arguments),
                      n && !t && l()),
                    this
                  )
                },
                remove: function () {
                  return (
                    T.each(arguments, function (e, t) {
                      for (var n; (n = T.inArray(t, o, n)) > -1; )
                        o.splice(n, 1), n <= a && a--
                    }),
                    this
                  )
                },
                has: function (e) {
                  return e ? T.inArray(e, o) > -1 : o.length > 0
                },
                empty: function () {
                  return o && (o = []), this
                },
                disable: function () {
                  return (r = s = []), (o = n = ''), this
                },
                disabled: function () {
                  return !o
                },
                lock: function () {
                  return (r = s = []), n || t || (o = n = ''), this
                },
                locked: function () {
                  return !!r
                },
                fireWith: function (e, n) {
                  return (
                    r ||
                      ((n = [e, (n = n || []).slice ? n.slice() : n]),
                      s.push(n),
                      t || l()),
                    this
                  )
                },
                fire: function () {
                  return c.fireWith(this, arguments), this
                },
                fired: function () {
                  return !!i
                },
              }
            return c
          }),
            T.extend({
              Deferred: function (e) {
                var t = [
                    [
                      'notify',
                      'progress',
                      T.Callbacks('memory'),
                      T.Callbacks('memory'),
                      2,
                    ],
                    [
                      'resolve',
                      'done',
                      T.Callbacks('once memory'),
                      T.Callbacks('once memory'),
                      0,
                      'resolved',
                    ],
                    [
                      'reject',
                      'fail',
                      T.Callbacks('once memory'),
                      T.Callbacks('once memory'),
                      1,
                      'rejected',
                    ],
                  ],
                  n = 'pending',
                  r = {
                    state: function () {
                      return n
                    },
                    always: function () {
                      return o.done(arguments).fail(arguments), this
                    },
                    catch: function (e) {
                      return r.then(null, e)
                    },
                    pipe: function () {
                      var e = arguments
                      return T.Deferred(function (n) {
                        T.each(t, function (t, i) {
                          var r = v(e[i[4]]) && e[i[4]]
                          o[i[1]](function () {
                            var e = r && r.apply(this, arguments)
                            e && v(e.promise)
                              ? e
                                  .promise()
                                  .progress(n.notify)
                                  .done(n.resolve)
                                  .fail(n.reject)
                              : n[i[0] + 'With'](this, r ? [e] : arguments)
                          })
                        }),
                          (e = null)
                      }).promise()
                    },
                    then: function (e, n, r) {
                      var o = 0
                      function s(e, t, n, r) {
                        return function () {
                          var a = this,
                            l = arguments,
                            c = function () {
                              var i, c
                              if (!(e < o)) {
                                if ((i = n.apply(a, l)) === t.promise())
                                  throw new TypeError(
                                    'Thenable self-resolution',
                                  )
                                ;(c =
                                  i &&
                                  ('object' == typeof i ||
                                    'function' == typeof i) &&
                                  i.then),
                                  v(c)
                                    ? r
                                      ? c.call(i, s(o, t, q, r), s(o, t, R, r))
                                      : (o++,
                                        c.call(
                                          i,
                                          s(o, t, q, r),
                                          s(o, t, R, r),
                                          s(o, t, q, t.notifyWith),
                                        ))
                                    : (n !== q && ((a = void 0), (l = [i])),
                                      (r || t.resolveWith)(a, l))
                              }
                            },
                            u = r
                              ? c
                              : function () {
                                  try {
                                    c()
                                  } catch (i) {
                                    T.Deferred.exceptionHook &&
                                      T.Deferred.exceptionHook(i, u.stackTrace),
                                      e + 1 >= o &&
                                        (n !== R && ((a = void 0), (l = [i])),
                                        t.rejectWith(a, l))
                                  }
                                }
                          e
                            ? u()
                            : (T.Deferred.getStackHook &&
                                (u.stackTrace = T.Deferred.getStackHook()),
                              i.setTimeout(u))
                        }
                      }
                      return T.Deferred(function (i) {
                        t[0][3].add(s(0, i, v(r) ? r : q, i.notifyWith)),
                          t[1][3].add(s(0, i, v(e) ? e : q)),
                          t[2][3].add(s(0, i, v(n) ? n : R))
                      }).promise()
                    },
                    promise: function (e) {
                      return null != e ? T.extend(e, r) : r
                    },
                  },
                  o = {}
                return (
                  T.each(t, function (e, i) {
                    var s = i[2],
                      a = i[5]
                    ;(r[i[1]] = s.add),
                      a &&
                        s.add(
                          function () {
                            n = a
                          },
                          t[3 - e][2].disable,
                          t[3 - e][3].disable,
                          t[0][2].lock,
                          t[0][3].lock,
                        ),
                      s.add(i[3].fire),
                      (o[i[0]] = function () {
                        return (
                          o[i[0] + 'With'](
                            this === o ? void 0 : this,
                            arguments,
                          ),
                          this
                        )
                      }),
                      (o[i[0] + 'With'] = s.fireWith)
                  }),
                  r.promise(o),
                  e && e.call(o, o),
                  o
                )
              },
              when: function (e) {
                var t = arguments.length,
                  n = t,
                  i = Array(n),
                  r = a.call(arguments),
                  o = T.Deferred(),
                  s = function (e) {
                    return function (n) {
                      ;(i[e] = this),
                        (r[e] = arguments.length > 1 ? a.call(arguments) : n),
                        --t || o.resolveWith(i, r)
                    }
                  }
                if (
                  t <= 1 &&
                  (B(e, o.done(s(n)).resolve, o.reject, !t),
                  'pending' === o.state() || v(r[n] && r[n].then))
                )
                  return o.then()
                for (; n--; ) B(r[n], s(n), o.reject)
                return o.promise()
              },
            })
          var W = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/
          ;(T.Deferred.exceptionHook = function (e, t) {
            i.console &&
              i.console.warn &&
              e &&
              W.test(e.name) &&
              i.console.warn(
                'jQuery.Deferred exception: ' + e.message,
                e.stack,
                t,
              )
          }),
            (T.readyException = function (e) {
              i.setTimeout(function () {
                throw e
              })
            })
          var F = T.Deferred()
          function z() {
            b.removeEventListener('DOMContentLoaded', z),
              i.removeEventListener('load', z),
              T.ready()
          }
          ;(T.fn.ready = function (e) {
            return (
              F.then(e).catch(function (e) {
                T.readyException(e)
              }),
              this
            )
          }),
            T.extend({
              isReady: !1,
              readyWait: 1,
              ready: function (e) {
                ;(!0 === e ? --T.readyWait : T.isReady) ||
                  ((T.isReady = !0),
                  (!0 !== e && --T.readyWait > 0) || F.resolveWith(b, [T]))
              },
            }),
            (T.ready.then = F.then),
            'complete' === b.readyState ||
            ('loading' !== b.readyState && !b.documentElement.doScroll)
              ? i.setTimeout(T.ready)
              : (b.addEventListener('DOMContentLoaded', z),
                i.addEventListener('load', z))
          var U = function (e, t, n, i, r, o, s) {
              var a = 0,
                l = e.length,
                c = null == n
              if ('object' === x(n))
                for (a in ((r = !0), n)) U(e, t, a, n[a], !0, o, s)
              else if (
                void 0 !== i &&
                ((r = !0),
                v(i) || (s = !0),
                c &&
                  (s
                    ? (t.call(e, i), (t = null))
                    : ((c = t),
                      (t = function (e, t, n) {
                        return c.call(T(e), n)
                      }))),
                t)
              )
                for (; a < l; a++)
                  t(e[a], n, s ? i : i.call(e[a], a, t(e[a], n)))
              return r ? e : c ? t.call(e) : l ? t(e[0], n) : o
            },
            V = /^-ms-/,
            X = /-([a-z])/g
          function Y(e, t) {
            return t.toUpperCase()
          }
          function K(e) {
            return e.replace(V, 'ms-').replace(X, Y)
          }
          var Q = function (e) {
            return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
          }
          function J() {
            this.expando = T.expando + J.uid++
          }
          ;(J.uid = 1),
            (J.prototype = {
              cache: function (e) {
                var t = e[this.expando]
                return (
                  t ||
                    ((t = {}),
                    Q(e) &&
                      (e.nodeType
                        ? (e[this.expando] = t)
                        : Object.defineProperty(e, this.expando, {
                            value: t,
                            configurable: !0,
                          }))),
                  t
                )
              },
              set: function (e, t, n) {
                var i,
                  r = this.cache(e)
                if ('string' == typeof t) r[K(t)] = n
                else for (i in t) r[K(i)] = t[i]
                return r
              },
              get: function (e, t) {
                return void 0 === t
                  ? this.cache(e)
                  : e[this.expando] && e[this.expando][K(t)]
              },
              access: function (e, t, n) {
                return void 0 === t ||
                  (t && 'string' == typeof t && void 0 === n)
                  ? this.get(e, t)
                  : (this.set(e, t, n), void 0 !== n ? n : t)
              },
              remove: function (e, t) {
                var n,
                  i = e[this.expando]
                if (void 0 !== i) {
                  if (void 0 !== t) {
                    n = (t = Array.isArray(t)
                      ? t.map(K)
                      : (t = K(t)) in i
                      ? [t]
                      : t.match(M) || []).length
                    for (; n--; ) delete i[t[n]]
                  }
                  ;(void 0 === t || T.isEmptyObject(i)) &&
                    (e.nodeType
                      ? (e[this.expando] = void 0)
                      : delete e[this.expando])
                }
              },
              hasData: function (e) {
                var t = e[this.expando]
                return void 0 !== t && !T.isEmptyObject(t)
              },
            })
          var G = new J(),
            Z = new J(),
            ee = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
            te = /[A-Z]/g
          function ne(e, t, n) {
            var i
            if (void 0 === n && 1 === e.nodeType)
              if (
                ((i = 'data-' + t.replace(te, '-$&').toLowerCase()),
                'string' == typeof (n = e.getAttribute(i)))
              ) {
                try {
                  n = (function (e) {
                    return (
                      'true' === e ||
                      ('false' !== e &&
                        ('null' === e
                          ? null
                          : e === +e + ''
                          ? +e
                          : ee.test(e)
                          ? JSON.parse(e)
                          : e))
                    )
                  })(n)
                } catch (e) {}
                Z.set(e, t, n)
              } else n = void 0
            return n
          }
          T.extend({
            hasData: function (e) {
              return Z.hasData(e) || G.hasData(e)
            },
            data: function (e, t, n) {
              return Z.access(e, t, n)
            },
            removeData: function (e, t) {
              Z.remove(e, t)
            },
            _data: function (e, t, n) {
              return G.access(e, t, n)
            },
            _removeData: function (e, t) {
              G.remove(e, t)
            },
          }),
            T.fn.extend({
              data: function (e, t) {
                var n,
                  i,
                  r,
                  o = this[0],
                  s = o && o.attributes
                if (void 0 === e) {
                  if (
                    this.length &&
                    ((r = Z.get(o)),
                    1 === o.nodeType && !G.get(o, 'hasDataAttrs'))
                  ) {
                    for (n = s.length; n--; )
                      s[n] &&
                        0 === (i = s[n].name).indexOf('data-') &&
                        ((i = K(i.slice(5))), ne(o, i, r[i]))
                    G.set(o, 'hasDataAttrs', !0)
                  }
                  return r
                }
                return 'object' == typeof e
                  ? this.each(function () {
                      Z.set(this, e)
                    })
                  : U(
                      this,
                      function (t) {
                        var n
                        if (o && void 0 === t)
                          return void 0 !== (n = Z.get(o, e)) ||
                            void 0 !== (n = ne(o, e))
                            ? n
                            : void 0
                        this.each(function () {
                          Z.set(this, e, t)
                        })
                      },
                      null,
                      t,
                      arguments.length > 1,
                      null,
                      !0,
                    )
              },
              removeData: function (e) {
                return this.each(function () {
                  Z.remove(this, e)
                })
              },
            }),
            T.extend({
              queue: function (e, t, n) {
                var i
                if (e)
                  return (
                    (t = (t || 'fx') + 'queue'),
                    (i = G.get(e, t)),
                    n &&
                      (!i || Array.isArray(n)
                        ? (i = G.access(e, t, T.makeArray(n)))
                        : i.push(n)),
                    i || []
                  )
              },
              dequeue: function (e, t) {
                t = t || 'fx'
                var n = T.queue(e, t),
                  i = n.length,
                  r = n.shift(),
                  o = T._queueHooks(e, t)
                'inprogress' === r && ((r = n.shift()), i--),
                  r &&
                    ('fx' === t && n.unshift('inprogress'),
                    delete o.stop,
                    r.call(
                      e,
                      function () {
                        T.dequeue(e, t)
                      },
                      o,
                    )),
                  !i && o && o.empty.fire()
              },
              _queueHooks: function (e, t) {
                var n = t + 'queueHooks'
                return (
                  G.get(e, n) ||
                  G.access(e, n, {
                    empty: T.Callbacks('once memory').add(function () {
                      G.remove(e, [t + 'queue', n])
                    }),
                  })
                )
              },
            }),
            T.fn.extend({
              queue: function (e, t) {
                var n = 2
                return (
                  'string' != typeof e && ((t = e), (e = 'fx'), n--),
                  arguments.length < n
                    ? T.queue(this[0], e)
                    : void 0 === t
                    ? this
                    : this.each(function () {
                        var n = T.queue(this, e, t)
                        T._queueHooks(this, e),
                          'fx' === e &&
                            'inprogress' !== n[0] &&
                            T.dequeue(this, e)
                      })
                )
              },
              dequeue: function (e) {
                return this.each(function () {
                  T.dequeue(this, e)
                })
              },
              clearQueue: function (e) {
                return this.queue(e || 'fx', [])
              },
              promise: function (e, t) {
                var n,
                  i = 1,
                  r = T.Deferred(),
                  o = this,
                  s = this.length,
                  a = function () {
                    --i || r.resolveWith(o, [o])
                  }
                for (
                  'string' != typeof e && ((t = e), (e = void 0)),
                    e = e || 'fx';
                  s--;

                )
                  (n = G.get(o[s], e + 'queueHooks')) &&
                    n.empty &&
                    (i++, n.empty.add(a))
                return a(), r.promise(t)
              },
            })
          var ie = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
            re = new RegExp('^(?:([+-])=|)(' + ie + ')([a-z%]*)$', 'i'),
            oe = ['Top', 'Right', 'Bottom', 'Left'],
            se = b.documentElement,
            ae = function (e) {
              return T.contains(e.ownerDocument, e)
            },
            le = { composed: !0 }
          se.getRootNode &&
            (ae = function (e) {
              return (
                T.contains(e.ownerDocument, e) ||
                e.getRootNode(le) === e.ownerDocument
              )
            })
          var ce = function (e, t) {
            return (
              'none' === (e = t || e).style.display ||
              ('' === e.style.display &&
                ae(e) &&
                'none' === T.css(e, 'display'))
            )
          }
          function ue(e, t, n, i) {
            var r,
              o,
              s = 20,
              a = i
                ? function () {
                    return i.cur()
                  }
                : function () {
                    return T.css(e, t, '')
                  },
              l = a(),
              c = (n && n[3]) || (T.cssNumber[t] ? '' : 'px'),
              u =
                e.nodeType &&
                (T.cssNumber[t] || ('px' !== c && +l)) &&
                re.exec(T.css(e, t))
            if (u && u[3] !== c) {
              for (l /= 2, c = c || u[3], u = +l || 1; s--; )
                T.style(e, t, u + c),
                  (1 - o) * (1 - (o = a() / l || 0.5)) <= 0 && (s = 0),
                  (u /= o)
              ;(u *= 2), T.style(e, t, u + c), (n = n || [])
            }
            return (
              n &&
                ((u = +u || +l || 0),
                (r = n[1] ? u + (n[1] + 1) * n[2] : +n[2]),
                i && ((i.unit = c), (i.start = u), (i.end = r))),
              r
            )
          }
          var de = {}
          function fe(e) {
            var t,
              n = e.ownerDocument,
              i = e.nodeName,
              r = de[i]
            return (
              r ||
              ((t = n.body.appendChild(n.createElement(i))),
              (r = T.css(t, 'display')),
              t.parentNode.removeChild(t),
              'none' === r && (r = 'block'),
              (de[i] = r),
              r)
            )
          }
          function pe(e, t) {
            for (var n, i, r = [], o = 0, s = e.length; o < s; o++)
              (i = e[o]).style &&
                ((n = i.style.display),
                t
                  ? ('none' === n &&
                      ((r[o] = G.get(i, 'display') || null),
                      r[o] || (i.style.display = '')),
                    '' === i.style.display && ce(i) && (r[o] = fe(i)))
                  : 'none' !== n && ((r[o] = 'none'), G.set(i, 'display', n)))
            for (o = 0; o < s; o++) null != r[o] && (e[o].style.display = r[o])
            return e
          }
          T.fn.extend({
            show: function () {
              return pe(this, !0)
            },
            hide: function () {
              return pe(this)
            },
            toggle: function (e) {
              return 'boolean' == typeof e
                ? e
                  ? this.show()
                  : this.hide()
                : this.each(function () {
                    ce(this) ? T(this).show() : T(this).hide()
                  })
            },
          })
          var he,
            ge,
            me = /^(?:checkbox|radio)$/i,
            ve = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
            ye = /^$|^module$|\/(?:java|ecma)script/i
          ;(he = b
            .createDocumentFragment()
            .appendChild(b.createElement('div'))),
            (ge = b.createElement('input')).setAttribute('type', 'radio'),
            ge.setAttribute('checked', 'checked'),
            ge.setAttribute('name', 't'),
            he.appendChild(ge),
            (m.checkClone = he.cloneNode(!0).cloneNode(!0).lastChild.checked),
            (he.innerHTML = '<textarea>x</textarea>'),
            (m.noCloneChecked = !!he.cloneNode(!0).lastChild.defaultValue),
            (he.innerHTML = '<option></option>'),
            (m.option = !!he.lastChild)
          var be = {
            thead: [1, '<table>', '</table>'],
            col: [2, '<table><colgroup>', '</colgroup></table>'],
            tr: [2, '<table><tbody>', '</tbody></table>'],
            td: [3, '<table><tbody><tr>', '</tr></tbody></table>'],
            _default: [0, '', ''],
          }
          function _e(e, t) {
            var n
            return (
              (n =
                void 0 !== e.getElementsByTagName
                  ? e.getElementsByTagName(t || '*')
                  : void 0 !== e.querySelectorAll
                  ? e.querySelectorAll(t || '*')
                  : []),
              void 0 === t || (t && D(e, t)) ? T.merge([e], n) : n
            )
          }
          function we(e, t) {
            for (var n = 0, i = e.length; n < i; n++)
              G.set(e[n], 'globalEval', !t || G.get(t[n], 'globalEval'))
          }
          ;(be.tbody = be.tfoot = be.colgroup = be.caption = be.thead),
            (be.th = be.td),
            m.option ||
              (be.optgroup = be.option = [
                1,
                "<select multiple='multiple'>",
                '</select>',
              ])
          var xe = /<|&#?\w+;/
          function Ee(e, t, n, i, r) {
            for (
              var o,
                s,
                a,
                l,
                c,
                u,
                d = t.createDocumentFragment(),
                f = [],
                p = 0,
                h = e.length;
              p < h;
              p++
            )
              if ((o = e[p]) || 0 === o)
                if ('object' === x(o)) T.merge(f, o.nodeType ? [o] : o)
                else if (xe.test(o)) {
                  for (
                    s = s || d.appendChild(t.createElement('div')),
                      a = (ve.exec(o) || ['', ''])[1].toLowerCase(),
                      l = be[a] || be._default,
                      s.innerHTML = l[1] + T.htmlPrefilter(o) + l[2],
                      u = l[0];
                    u--;

                  )
                    s = s.lastChild
                  T.merge(f, s.childNodes),
                    ((s = d.firstChild).textContent = '')
                } else f.push(t.createTextNode(o))
            for (d.textContent = '', p = 0; (o = f[p++]); )
              if (i && T.inArray(o, i) > -1) r && r.push(o)
              else if (
                ((c = ae(o)),
                (s = _e(d.appendChild(o), 'script')),
                c && we(s),
                n)
              )
                for (u = 0; (o = s[u++]); ) ye.test(o.type || '') && n.push(o)
            return d
          }
          var Te = /^([^.]*)(?:\.(.+)|)/
          function Ce() {
            return !0
          }
          function Ae() {
            return !1
          }
          function ke(e, t) {
            return (
              (e ===
                (function () {
                  try {
                    return b.activeElement
                  } catch (e) {}
                })()) ==
              ('focus' === t)
            )
          }
          function Se(e, t, n, i, r, o) {
            var s, a
            if ('object' == typeof t) {
              for (a in ('string' != typeof n && ((i = i || n), (n = void 0)),
              t))
                Se(e, a, n, i, t[a], o)
              return e
            }
            if (
              (null == i && null == r
                ? ((r = n), (i = n = void 0))
                : null == r &&
                  ('string' == typeof n
                    ? ((r = i), (i = void 0))
                    : ((r = i), (i = n), (n = void 0))),
              !1 === r)
            )
              r = Ae
            else if (!r) return e
            return (
              1 === o &&
                ((s = r),
                (r = function (e) {
                  return T().off(e), s.apply(this, arguments)
                }),
                (r.guid = s.guid || (s.guid = T.guid++))),
              e.each(function () {
                T.event.add(this, t, r, i, n)
              })
            )
          }
          function Oe(e, t, n) {
            n
              ? (G.set(e, t, !1),
                T.event.add(e, t, {
                  namespace: !1,
                  handler: function (e) {
                    var i,
                      r,
                      o = G.get(this, t)
                    if (1 & e.isTrigger && this[t]) {
                      if (o.length)
                        (T.event.special[t] || {}).delegateType &&
                          e.stopPropagation()
                      else if (
                        ((o = a.call(arguments)),
                        G.set(this, t, o),
                        (i = n(this, t)),
                        this[t](),
                        o !== (r = G.get(this, t)) || i
                          ? G.set(this, t, !1)
                          : (r = {}),
                        o !== r)
                      )
                        return (
                          e.stopImmediatePropagation(),
                          e.preventDefault(),
                          r && r.value
                        )
                    } else
                      o.length &&
                        (G.set(this, t, {
                          value: T.event.trigger(
                            T.extend(o[0], T.Event.prototype),
                            o.slice(1),
                            this,
                          ),
                        }),
                        e.stopImmediatePropagation())
                  },
                }))
              : void 0 === G.get(e, t) && T.event.add(e, t, Ce)
          }
          ;(T.event = {
            global: {},
            add: function (e, t, n, i, r) {
              var o,
                s,
                a,
                l,
                c,
                u,
                d,
                f,
                p,
                h,
                g,
                m = G.get(e)
              if (Q(e))
                for (
                  n.handler && ((n = (o = n).handler), (r = o.selector)),
                    r && T.find.matchesSelector(se, r),
                    n.guid || (n.guid = T.guid++),
                    (l = m.events) || (l = m.events = Object.create(null)),
                    (s = m.handle) ||
                      (s = m.handle = function (t) {
                        return void 0 !== T && T.event.triggered !== t.type
                          ? T.event.dispatch.apply(e, arguments)
                          : void 0
                      }),
                    c = (t = (t || '').match(M) || ['']).length;
                  c--;

                )
                  (p = g = (a = Te.exec(t[c]) || [])[1]),
                    (h = (a[2] || '').split('.').sort()),
                    p &&
                      ((d = T.event.special[p] || {}),
                      (p = (r ? d.delegateType : d.bindType) || p),
                      (d = T.event.special[p] || {}),
                      (u = T.extend(
                        {
                          type: p,
                          origType: g,
                          data: i,
                          handler: n,
                          guid: n.guid,
                          selector: r,
                          needsContext: r && T.expr.match.needsContext.test(r),
                          namespace: h.join('.'),
                        },
                        o,
                      )),
                      (f = l[p]) ||
                        (((f = l[p] = []).delegateCount = 0),
                        (d.setup && !1 !== d.setup.call(e, i, h, s)) ||
                          (e.addEventListener && e.addEventListener(p, s))),
                      d.add &&
                        (d.add.call(e, u),
                        u.handler.guid || (u.handler.guid = n.guid)),
                      r ? f.splice(f.delegateCount++, 0, u) : f.push(u),
                      (T.event.global[p] = !0))
            },
            remove: function (e, t, n, i, r) {
              var o,
                s,
                a,
                l,
                c,
                u,
                d,
                f,
                p,
                h,
                g,
                m = G.hasData(e) && G.get(e)
              if (m && (l = m.events)) {
                for (c = (t = (t || '').match(M) || ['']).length; c--; )
                  if (
                    ((p = g = (a = Te.exec(t[c]) || [])[1]),
                    (h = (a[2] || '').split('.').sort()),
                    p)
                  ) {
                    for (
                      d = T.event.special[p] || {},
                        f =
                          l[(p = (i ? d.delegateType : d.bindType) || p)] || [],
                        a =
                          a[2] &&
                          new RegExp(
                            '(^|\\.)' + h.join('\\.(?:.*\\.|)') + '(\\.|$)',
                          ),
                        s = o = f.length;
                      o--;

                    )
                      (u = f[o]),
                        (!r && g !== u.origType) ||
                          (n && n.guid !== u.guid) ||
                          (a && !a.test(u.namespace)) ||
                          (i &&
                            i !== u.selector &&
                            ('**' !== i || !u.selector)) ||
                          (f.splice(o, 1),
                          u.selector && f.delegateCount--,
                          d.remove && d.remove.call(e, u))
                    s &&
                      !f.length &&
                      ((d.teardown && !1 !== d.teardown.call(e, h, m.handle)) ||
                        T.removeEvent(e, p, m.handle),
                      delete l[p])
                  } else for (p in l) T.event.remove(e, p + t[c], n, i, !0)
                T.isEmptyObject(l) && G.remove(e, 'handle events')
              }
            },
            dispatch: function (e) {
              var t,
                n,
                i,
                r,
                o,
                s,
                a = new Array(arguments.length),
                l = T.event.fix(e),
                c =
                  (G.get(this, 'events') || Object.create(null))[l.type] || [],
                u = T.event.special[l.type] || {}
              for (a[0] = l, t = 1; t < arguments.length; t++)
                a[t] = arguments[t]
              if (
                ((l.delegateTarget = this),
                !u.preDispatch || !1 !== u.preDispatch.call(this, l))
              ) {
                for (
                  s = T.event.handlers.call(this, l, c), t = 0;
                  (r = s[t++]) && !l.isPropagationStopped();

                )
                  for (
                    l.currentTarget = r.elem, n = 0;
                    (o = r.handlers[n++]) && !l.isImmediatePropagationStopped();

                  )
                    (l.rnamespace &&
                      !1 !== o.namespace &&
                      !l.rnamespace.test(o.namespace)) ||
                      ((l.handleObj = o),
                      (l.data = o.data),
                      void 0 !==
                        (i = (
                          (T.event.special[o.origType] || {}).handle ||
                          o.handler
                        ).apply(r.elem, a)) &&
                        !1 === (l.result = i) &&
                        (l.preventDefault(), l.stopPropagation()))
                return u.postDispatch && u.postDispatch.call(this, l), l.result
              }
            },
            handlers: function (e, t) {
              var n,
                i,
                r,
                o,
                s,
                a = [],
                l = t.delegateCount,
                c = e.target
              if (l && c.nodeType && !('click' === e.type && e.button >= 1))
                for (; c !== this; c = c.parentNode || this)
                  if (
                    1 === c.nodeType &&
                    ('click' !== e.type || !0 !== c.disabled)
                  ) {
                    for (o = [], s = {}, n = 0; n < l; n++)
                      void 0 === s[(r = (i = t[n]).selector + ' ')] &&
                        (s[r] = i.needsContext
                          ? T(r, this).index(c) > -1
                          : T.find(r, this, null, [c]).length),
                        s[r] && o.push(i)
                    o.length && a.push({ elem: c, handlers: o })
                  }
              return (
                (c = this),
                l < t.length && a.push({ elem: c, handlers: t.slice(l) }),
                a
              )
            },
            addProp: function (e, t) {
              Object.defineProperty(T.Event.prototype, e, {
                enumerable: !0,
                configurable: !0,
                get: v(t)
                  ? function () {
                      if (this.originalEvent) return t(this.originalEvent)
                    }
                  : function () {
                      if (this.originalEvent) return this.originalEvent[e]
                    },
                set: function (t) {
                  Object.defineProperty(this, e, {
                    enumerable: !0,
                    configurable: !0,
                    writable: !0,
                    value: t,
                  })
                },
              })
            },
            fix: function (e) {
              return e[T.expando] ? e : new T.Event(e)
            },
            special: {
              load: { noBubble: !0 },
              click: {
                setup: function (e) {
                  var t = this || e
                  return (
                    me.test(t.type) &&
                      t.click &&
                      D(t, 'input') &&
                      Oe(t, 'click', Ce),
                    !1
                  )
                },
                trigger: function (e) {
                  var t = this || e
                  return (
                    me.test(t.type) &&
                      t.click &&
                      D(t, 'input') &&
                      Oe(t, 'click'),
                    !0
                  )
                },
                _default: function (e) {
                  var t = e.target
                  return (
                    (me.test(t.type) &&
                      t.click &&
                      D(t, 'input') &&
                      G.get(t, 'click')) ||
                    D(t, 'a')
                  )
                },
              },
              beforeunload: {
                postDispatch: function (e) {
                  void 0 !== e.result &&
                    e.originalEvent &&
                    (e.originalEvent.returnValue = e.result)
                },
              },
            },
          }),
            (T.removeEvent = function (e, t, n) {
              e.removeEventListener && e.removeEventListener(t, n)
            }),
            (T.Event = function (e, t) {
              if (!(this instanceof T.Event)) return new T.Event(e, t)
              e && e.type
                ? ((this.originalEvent = e),
                  (this.type = e.type),
                  (this.isDefaultPrevented =
                    e.defaultPrevented ||
                    (void 0 === e.defaultPrevented && !1 === e.returnValue)
                      ? Ce
                      : Ae),
                  (this.target =
                    e.target && 3 === e.target.nodeType
                      ? e.target.parentNode
                      : e.target),
                  (this.currentTarget = e.currentTarget),
                  (this.relatedTarget = e.relatedTarget))
                : (this.type = e),
                t && T.extend(this, t),
                (this.timeStamp = (e && e.timeStamp) || Date.now()),
                (this[T.expando] = !0)
            }),
            (T.Event.prototype = {
              constructor: T.Event,
              isDefaultPrevented: Ae,
              isPropagationStopped: Ae,
              isImmediatePropagationStopped: Ae,
              isSimulated: !1,
              preventDefault: function () {
                var e = this.originalEvent
                ;(this.isDefaultPrevented = Ce),
                  e && !this.isSimulated && e.preventDefault()
              },
              stopPropagation: function () {
                var e = this.originalEvent
                ;(this.isPropagationStopped = Ce),
                  e && !this.isSimulated && e.stopPropagation()
              },
              stopImmediatePropagation: function () {
                var e = this.originalEvent
                ;(this.isImmediatePropagationStopped = Ce),
                  e && !this.isSimulated && e.stopImmediatePropagation(),
                  this.stopPropagation()
              },
            }),
            T.each(
              {
                altKey: !0,
                bubbles: !0,
                cancelable: !0,
                changedTouches: !0,
                ctrlKey: !0,
                detail: !0,
                eventPhase: !0,
                metaKey: !0,
                pageX: !0,
                pageY: !0,
                shiftKey: !0,
                view: !0,
                char: !0,
                code: !0,
                charCode: !0,
                key: !0,
                keyCode: !0,
                button: !0,
                buttons: !0,
                clientX: !0,
                clientY: !0,
                offsetX: !0,
                offsetY: !0,
                pointerId: !0,
                pointerType: !0,
                screenX: !0,
                screenY: !0,
                targetTouches: !0,
                toElement: !0,
                touches: !0,
                which: !0,
              },
              T.event.addProp,
            ),
            T.each({ focus: 'focusin', blur: 'focusout' }, function (e, t) {
              T.event.special[e] = {
                setup: function () {
                  return Oe(this, e, ke), !1
                },
                trigger: function () {
                  return Oe(this, e), !0
                },
                _default: function () {
                  return !0
                },
                delegateType: t,
              }
            }),
            T.each(
              {
                mouseenter: 'mouseover',
                mouseleave: 'mouseout',
                pointerenter: 'pointerover',
                pointerleave: 'pointerout',
              },
              function (e, t) {
                T.event.special[e] = {
                  delegateType: t,
                  bindType: t,
                  handle: function (e) {
                    var n,
                      i = this,
                      r = e.relatedTarget,
                      o = e.handleObj
                    return (
                      (r && (r === i || T.contains(i, r))) ||
                        ((e.type = o.origType),
                        (n = o.handler.apply(this, arguments)),
                        (e.type = t)),
                      n
                    )
                  },
                }
              },
            ),
            T.fn.extend({
              on: function (e, t, n, i) {
                return Se(this, e, t, n, i)
              },
              one: function (e, t, n, i) {
                return Se(this, e, t, n, i, 1)
              },
              off: function (e, t, n) {
                var i, r
                if (e && e.preventDefault && e.handleObj)
                  return (
                    (i = e.handleObj),
                    T(e.delegateTarget).off(
                      i.namespace ? i.origType + '.' + i.namespace : i.origType,
                      i.selector,
                      i.handler,
                    ),
                    this
                  )
                if ('object' == typeof e) {
                  for (r in e) this.off(r, t, e[r])
                  return this
                }
                return (
                  (!1 !== t && 'function' != typeof t) ||
                    ((n = t), (t = void 0)),
                  !1 === n && (n = Ae),
                  this.each(function () {
                    T.event.remove(this, e, n, t)
                  })
                )
              },
            })
          var De = /<script|<style|<link/i,
            Ne = /checked\s*(?:[^=]|=\s*.checked.)/i,
            Le = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g
          function je(e, t) {
            return (
              (D(e, 'table') &&
                D(11 !== t.nodeType ? t : t.firstChild, 'tr') &&
                T(e).children('tbody')[0]) ||
              e
            )
          }
          function $e(e) {
            return (
              (e.type = (null !== e.getAttribute('type')) + '/' + e.type), e
            )
          }
          function Pe(e) {
            return (
              'true/' === (e.type || '').slice(0, 5)
                ? (e.type = e.type.slice(5))
                : e.removeAttribute('type'),
              e
            )
          }
          function Ie(e, t) {
            var n, i, r, o, s, a
            if (1 === t.nodeType) {
              if (G.hasData(e) && (a = G.get(e).events))
                for (r in (G.remove(t, 'handle events'), a))
                  for (n = 0, i = a[r].length; n < i; n++)
                    T.event.add(t, r, a[r][n])
              Z.hasData(e) &&
                ((o = Z.access(e)), (s = T.extend({}, o)), Z.set(t, s))
            }
          }
          function He(e, t) {
            var n = t.nodeName.toLowerCase()
            'input' === n && me.test(e.type)
              ? (t.checked = e.checked)
              : ('input' !== n && 'textarea' !== n) ||
                (t.defaultValue = e.defaultValue)
          }
          function Me(e, t, n, i) {
            t = l(t)
            var r,
              o,
              s,
              a,
              c,
              u,
              d = 0,
              f = e.length,
              p = f - 1,
              h = t[0],
              g = v(h)
            if (
              g ||
              (f > 1 && 'string' == typeof h && !m.checkClone && Ne.test(h))
            )
              return e.each(function (r) {
                var o = e.eq(r)
                g && (t[0] = h.call(this, r, o.html())), Me(o, t, n, i)
              })
            if (
              f &&
              ((o = (r = Ee(t, e[0].ownerDocument, !1, e, i)).firstChild),
              1 === r.childNodes.length && (r = o),
              o || i)
            ) {
              for (a = (s = T.map(_e(r, 'script'), $e)).length; d < f; d++)
                (c = r),
                  d !== p &&
                    ((c = T.clone(c, !0, !0)),
                    a && T.merge(s, _e(c, 'script'))),
                  n.call(e[d], c, d)
              if (a)
                for (
                  u = s[s.length - 1].ownerDocument, T.map(s, Pe), d = 0;
                  d < a;
                  d++
                )
                  (c = s[d]),
                    ye.test(c.type || '') &&
                      !G.access(c, 'globalEval') &&
                      T.contains(u, c) &&
                      (c.src && 'module' !== (c.type || '').toLowerCase()
                        ? T._evalUrl &&
                          !c.noModule &&
                          T._evalUrl(
                            c.src,
                            { nonce: c.nonce || c.getAttribute('nonce') },
                            u,
                          )
                        : w(c.textContent.replace(Le, ''), c, u))
            }
            return e
          }
          function qe(e, t, n) {
            for (
              var i, r = t ? T.filter(t, e) : e, o = 0;
              null != (i = r[o]);
              o++
            )
              n || 1 !== i.nodeType || T.cleanData(_e(i)),
                i.parentNode &&
                  (n && ae(i) && we(_e(i, 'script')),
                  i.parentNode.removeChild(i))
            return e
          }
          T.extend({
            htmlPrefilter: function (e) {
              return e
            },
            clone: function (e, t, n) {
              var i,
                r,
                o,
                s,
                a = e.cloneNode(!0),
                l = ae(e)
              if (
                !(
                  m.noCloneChecked ||
                  (1 !== e.nodeType && 11 !== e.nodeType) ||
                  T.isXMLDoc(e)
                )
              )
                for (s = _e(a), i = 0, r = (o = _e(e)).length; i < r; i++)
                  He(o[i], s[i])
              if (t)
                if (n)
                  for (
                    o = o || _e(e), s = s || _e(a), i = 0, r = o.length;
                    i < r;
                    i++
                  )
                    Ie(o[i], s[i])
                else Ie(e, a)
              return (
                (s = _e(a, 'script')).length > 0 &&
                  we(s, !l && _e(e, 'script')),
                a
              )
            },
            cleanData: function (e) {
              for (
                var t, n, i, r = T.event.special, o = 0;
                void 0 !== (n = e[o]);
                o++
              )
                if (Q(n)) {
                  if ((t = n[G.expando])) {
                    if (t.events)
                      for (i in t.events)
                        r[i]
                          ? T.event.remove(n, i)
                          : T.removeEvent(n, i, t.handle)
                    n[G.expando] = void 0
                  }
                  n[Z.expando] && (n[Z.expando] = void 0)
                }
            },
          }),
            T.fn.extend({
              detach: function (e) {
                return qe(this, e, !0)
              },
              remove: function (e) {
                return qe(this, e)
              },
              text: function (e) {
                return U(
                  this,
                  function (e) {
                    return void 0 === e
                      ? T.text(this)
                      : this.empty().each(function () {
                          ;(1 !== this.nodeType &&
                            11 !== this.nodeType &&
                            9 !== this.nodeType) ||
                            (this.textContent = e)
                        })
                  },
                  null,
                  e,
                  arguments.length,
                )
              },
              append: function () {
                return Me(this, arguments, function (e) {
                  ;(1 !== this.nodeType &&
                    11 !== this.nodeType &&
                    9 !== this.nodeType) ||
                    je(this, e).appendChild(e)
                })
              },
              prepend: function () {
                return Me(this, arguments, function (e) {
                  if (
                    1 === this.nodeType ||
                    11 === this.nodeType ||
                    9 === this.nodeType
                  ) {
                    var t = je(this, e)
                    t.insertBefore(e, t.firstChild)
                  }
                })
              },
              before: function () {
                return Me(this, arguments, function (e) {
                  this.parentNode && this.parentNode.insertBefore(e, this)
                })
              },
              after: function () {
                return Me(this, arguments, function (e) {
                  this.parentNode &&
                    this.parentNode.insertBefore(e, this.nextSibling)
                })
              },
              empty: function () {
                for (var e, t = 0; null != (e = this[t]); t++)
                  1 === e.nodeType &&
                    (T.cleanData(_e(e, !1)), (e.textContent = ''))
                return this
              },
              clone: function (e, t) {
                return (
                  (e = null != e && e),
                  (t = null == t ? e : t),
                  this.map(function () {
                    return T.clone(this, e, t)
                  })
                )
              },
              html: function (e) {
                return U(
                  this,
                  function (e) {
                    var t = this[0] || {},
                      n = 0,
                      i = this.length
                    if (void 0 === e && 1 === t.nodeType) return t.innerHTML
                    if (
                      'string' == typeof e &&
                      !De.test(e) &&
                      !be[(ve.exec(e) || ['', ''])[1].toLowerCase()]
                    ) {
                      e = T.htmlPrefilter(e)
                      try {
                        for (; n < i; n++)
                          1 === (t = this[n] || {}).nodeType &&
                            (T.cleanData(_e(t, !1)), (t.innerHTML = e))
                        t = 0
                      } catch (e) {}
                    }
                    t && this.empty().append(e)
                  },
                  null,
                  e,
                  arguments.length,
                )
              },
              replaceWith: function () {
                var e = []
                return Me(
                  this,
                  arguments,
                  function (t) {
                    var n = this.parentNode
                    T.inArray(this, e) < 0 &&
                      (T.cleanData(_e(this)), n && n.replaceChild(t, this))
                  },
                  e,
                )
              },
            }),
            T.each(
              {
                appendTo: 'append',
                prependTo: 'prepend',
                insertBefore: 'before',
                insertAfter: 'after',
                replaceAll: 'replaceWith',
              },
              function (e, t) {
                T.fn[e] = function (e) {
                  for (
                    var n, i = [], r = T(e), o = r.length - 1, s = 0;
                    s <= o;
                    s++
                  )
                    (n = s === o ? this : this.clone(!0)),
                      T(r[s])[t](n),
                      c.apply(i, n.get())
                  return this.pushStack(i)
                }
              },
            )
          var Re = new RegExp('^(' + ie + ')(?!px)[a-z%]+$', 'i'),
            Be = function (e) {
              var t = e.ownerDocument.defaultView
              return (t && t.opener) || (t = i), t.getComputedStyle(e)
            },
            We = function (e, t, n) {
              var i,
                r,
                o = {}
              for (r in t) (o[r] = e.style[r]), (e.style[r] = t[r])
              for (r in ((i = n.call(e)), t)) e.style[r] = o[r]
              return i
            },
            Fe = new RegExp(oe.join('|'), 'i')
          function ze(e, t, n) {
            var i,
              r,
              o,
              s,
              a = e.style
            return (
              (n = n || Be(e)) &&
                ('' !== (s = n.getPropertyValue(t) || n[t]) ||
                  ae(e) ||
                  (s = T.style(e, t)),
                !m.pixelBoxStyles() &&
                  Re.test(s) &&
                  Fe.test(t) &&
                  ((i = a.width),
                  (r = a.minWidth),
                  (o = a.maxWidth),
                  (a.minWidth = a.maxWidth = a.width = s),
                  (s = n.width),
                  (a.width = i),
                  (a.minWidth = r),
                  (a.maxWidth = o))),
              void 0 !== s ? s + '' : s
            )
          }
          function Ue(e, t) {
            return {
              get: function () {
                if (!e()) return (this.get = t).apply(this, arguments)
                delete this.get
              },
            }
          }
          !(function () {
            function e() {
              if (u) {
                ;(c.style.cssText =
                  'position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0'),
                  (u.style.cssText =
                    'position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%'),
                  se.appendChild(c).appendChild(u)
                var e = i.getComputedStyle(u)
                ;(n = '1%' !== e.top),
                  (l = 12 === t(e.marginLeft)),
                  (u.style.right = '60%'),
                  (s = 36 === t(e.right)),
                  (r = 36 === t(e.width)),
                  (u.style.position = 'absolute'),
                  (o = 12 === t(u.offsetWidth / 3)),
                  se.removeChild(c),
                  (u = null)
              }
            }
            function t(e) {
              return Math.round(parseFloat(e))
            }
            var n,
              r,
              o,
              s,
              a,
              l,
              c = b.createElement('div'),
              u = b.createElement('div')
            u.style &&
              ((u.style.backgroundClip = 'content-box'),
              (u.cloneNode(!0).style.backgroundClip = ''),
              (m.clearCloneStyle = 'content-box' === u.style.backgroundClip),
              T.extend(m, {
                boxSizingReliable: function () {
                  return e(), r
                },
                pixelBoxStyles: function () {
                  return e(), s
                },
                pixelPosition: function () {
                  return e(), n
                },
                reliableMarginLeft: function () {
                  return e(), l
                },
                scrollboxSize: function () {
                  return e(), o
                },
                reliableTrDimensions: function () {
                  var e, t, n, r
                  return (
                    null == a &&
                      ((e = b.createElement('table')),
                      (t = b.createElement('tr')),
                      (n = b.createElement('div')),
                      (e.style.cssText =
                        'position:absolute;left:-11111px;border-collapse:separate'),
                      (t.style.cssText = 'border:1px solid'),
                      (t.style.height = '1px'),
                      (n.style.height = '9px'),
                      (n.style.display = 'block'),
                      se.appendChild(e).appendChild(t).appendChild(n),
                      (r = i.getComputedStyle(t)),
                      (a =
                        parseInt(r.height, 10) +
                          parseInt(r.borderTopWidth, 10) +
                          parseInt(r.borderBottomWidth, 10) ===
                        t.offsetHeight),
                      se.removeChild(e)),
                    a
                  )
                },
              }))
          })()
          var Ve = ['Webkit', 'Moz', 'ms'],
            Xe = b.createElement('div').style,
            Ye = {}
          function Ke(e) {
            return (
              T.cssProps[e] ||
              Ye[e] ||
              (e in Xe
                ? e
                : (Ye[e] =
                    (function (e) {
                      for (
                        var t = e[0].toUpperCase() + e.slice(1), n = Ve.length;
                        n--;

                      )
                        if ((e = Ve[n] + t) in Xe) return e
                    })(e) || e))
            )
          }
          var Qe = /^(none|table(?!-c[ea]).+)/,
            Je = /^--/,
            Ge = {
              position: 'absolute',
              visibility: 'hidden',
              display: 'block',
            },
            Ze = { letterSpacing: '0', fontWeight: '400' }
          function et(e, t, n) {
            var i = re.exec(t)
            return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || 'px') : t
          }
          function tt(e, t, n, i, r, o) {
            var s = 'width' === t ? 1 : 0,
              a = 0,
              l = 0
            if (n === (i ? 'border' : 'content')) return 0
            for (; s < 4; s += 2)
              'margin' === n && (l += T.css(e, n + oe[s], !0, r)),
                i
                  ? ('content' === n &&
                      (l -= T.css(e, 'padding' + oe[s], !0, r)),
                    'margin' !== n &&
                      (l -= T.css(e, 'border' + oe[s] + 'Width', !0, r)))
                  : ((l += T.css(e, 'padding' + oe[s], !0, r)),
                    'padding' !== n
                      ? (l += T.css(e, 'border' + oe[s] + 'Width', !0, r))
                      : (a += T.css(e, 'border' + oe[s] + 'Width', !0, r)))
            return (
              !i &&
                o >= 0 &&
                (l +=
                  Math.max(
                    0,
                    Math.ceil(
                      e['offset' + t[0].toUpperCase() + t.slice(1)] -
                        o -
                        l -
                        a -
                        0.5,
                    ),
                  ) || 0),
              l
            )
          }
          function nt(e, t, n) {
            var i = Be(e),
              r =
                (!m.boxSizingReliable() || n) &&
                'border-box' === T.css(e, 'boxSizing', !1, i),
              o = r,
              s = ze(e, t, i),
              a = 'offset' + t[0].toUpperCase() + t.slice(1)
            if (Re.test(s)) {
              if (!n) return s
              s = 'auto'
            }
            return (
              ((!m.boxSizingReliable() && r) ||
                (!m.reliableTrDimensions() && D(e, 'tr')) ||
                'auto' === s ||
                (!parseFloat(s) && 'inline' === T.css(e, 'display', !1, i))) &&
                e.getClientRects().length &&
                ((r = 'border-box' === T.css(e, 'boxSizing', !1, i)),
                (o = a in e) && (s = e[a])),
              (s = parseFloat(s) || 0) +
                tt(e, t, n || (r ? 'border' : 'content'), o, i, s) +
                'px'
            )
          }
          function it(e, t, n, i, r) {
            return new it.prototype.init(e, t, n, i, r)
          }
          T.extend({
            cssHooks: {
              opacity: {
                get: function (e, t) {
                  if (t) {
                    var n = ze(e, 'opacity')
                    return '' === n ? '1' : n
                  }
                },
              },
            },
            cssNumber: {
              animationIterationCount: !0,
              columnCount: !0,
              fillOpacity: !0,
              flexGrow: !0,
              flexShrink: !0,
              fontWeight: !0,
              gridArea: !0,
              gridColumn: !0,
              gridColumnEnd: !0,
              gridColumnStart: !0,
              gridRow: !0,
              gridRowEnd: !0,
              gridRowStart: !0,
              lineHeight: !0,
              opacity: !0,
              order: !0,
              orphans: !0,
              widows: !0,
              zIndex: !0,
              zoom: !0,
            },
            cssProps: {},
            style: function (e, t, n, i) {
              if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var r,
                  o,
                  s,
                  a = K(t),
                  l = Je.test(t),
                  c = e.style
                if (
                  (l || (t = Ke(a)),
                  (s = T.cssHooks[t] || T.cssHooks[a]),
                  void 0 === n)
                )
                  return s && 'get' in s && void 0 !== (r = s.get(e, !1, i))
                    ? r
                    : c[t]
                'string' == (o = typeof n) &&
                  (r = re.exec(n)) &&
                  r[1] &&
                  ((n = ue(e, t, r)), (o = 'number')),
                  null != n &&
                    n == n &&
                    ('number' !== o ||
                      l ||
                      (n += (r && r[3]) || (T.cssNumber[a] ? '' : 'px')),
                    m.clearCloneStyle ||
                      '' !== n ||
                      0 !== t.indexOf('background') ||
                      (c[t] = 'inherit'),
                    (s && 'set' in s && void 0 === (n = s.set(e, n, i))) ||
                      (l ? c.setProperty(t, n) : (c[t] = n)))
              }
            },
            css: function (e, t, n, i) {
              var r,
                o,
                s,
                a = K(t)
              return (
                Je.test(t) || (t = Ke(a)),
                (s = T.cssHooks[t] || T.cssHooks[a]) &&
                  'get' in s &&
                  (r = s.get(e, !0, n)),
                void 0 === r && (r = ze(e, t, i)),
                'normal' === r && t in Ze && (r = Ze[t]),
                '' === n || n
                  ? ((o = parseFloat(r)), !0 === n || isFinite(o) ? o || 0 : r)
                  : r
              )
            },
          }),
            T.each(['height', 'width'], function (e, t) {
              T.cssHooks[t] = {
                get: function (e, n, i) {
                  if (n)
                    return !Qe.test(T.css(e, 'display')) ||
                      (e.getClientRects().length &&
                        e.getBoundingClientRect().width)
                      ? nt(e, t, i)
                      : We(e, Ge, function () {
                          return nt(e, t, i)
                        })
                },
                set: function (e, n, i) {
                  var r,
                    o = Be(e),
                    s = !m.scrollboxSize() && 'absolute' === o.position,
                    a =
                      (s || i) && 'border-box' === T.css(e, 'boxSizing', !1, o),
                    l = i ? tt(e, t, i, a, o) : 0
                  return (
                    a &&
                      s &&
                      (l -= Math.ceil(
                        e['offset' + t[0].toUpperCase() + t.slice(1)] -
                          parseFloat(o[t]) -
                          tt(e, t, 'border', !1, o) -
                          0.5,
                      )),
                    l &&
                      (r = re.exec(n)) &&
                      'px' !== (r[3] || 'px') &&
                      ((e.style[t] = n), (n = T.css(e, t))),
                    et(0, n, l)
                  )
                },
              }
            }),
            (T.cssHooks.marginLeft = Ue(m.reliableMarginLeft, function (e, t) {
              if (t)
                return (
                  (parseFloat(ze(e, 'marginLeft')) ||
                    e.getBoundingClientRect().left -
                      We(e, { marginLeft: 0 }, function () {
                        return e.getBoundingClientRect().left
                      })) + 'px'
                )
            })),
            T.each({ margin: '', padding: '', border: 'Width' }, function (
              e,
              t,
            ) {
              ;(T.cssHooks[e + t] = {
                expand: function (n) {
                  for (
                    var i = 0,
                      r = {},
                      o = 'string' == typeof n ? n.split(' ') : [n];
                    i < 4;
                    i++
                  )
                    r[e + oe[i] + t] = o[i] || o[i - 2] || o[0]
                  return r
                },
              }),
                'margin' !== e && (T.cssHooks[e + t].set = et)
            }),
            T.fn.extend({
              css: function (e, t) {
                return U(
                  this,
                  function (e, t, n) {
                    var i,
                      r,
                      o = {},
                      s = 0
                    if (Array.isArray(t)) {
                      for (i = Be(e), r = t.length; s < r; s++)
                        o[t[s]] = T.css(e, t[s], !1, i)
                      return o
                    }
                    return void 0 !== n ? T.style(e, t, n) : T.css(e, t)
                  },
                  e,
                  t,
                  arguments.length > 1,
                )
              },
            }),
            (T.Tween = it),
            (it.prototype = {
              constructor: it,
              init: function (e, t, n, i, r, o) {
                ;(this.elem = e),
                  (this.prop = n),
                  (this.easing = r || T.easing._default),
                  (this.options = t),
                  (this.start = this.now = this.cur()),
                  (this.end = i),
                  (this.unit = o || (T.cssNumber[n] ? '' : 'px'))
              },
              cur: function () {
                var e = it.propHooks[this.prop]
                return e && e.get
                  ? e.get(this)
                  : it.propHooks._default.get(this)
              },
              run: function (e) {
                var t,
                  n = it.propHooks[this.prop]
                return (
                  this.options.duration
                    ? (this.pos = t = T.easing[this.easing](
                        e,
                        this.options.duration * e,
                        0,
                        1,
                        this.options.duration,
                      ))
                    : (this.pos = t = e),
                  (this.now = (this.end - this.start) * t + this.start),
                  this.options.step &&
                    this.options.step.call(this.elem, this.now, this),
                  n && n.set ? n.set(this) : it.propHooks._default.set(this),
                  this
                )
              },
            }),
            (it.prototype.init.prototype = it.prototype),
            (it.propHooks = {
              _default: {
                get: function (e) {
                  var t
                  return 1 !== e.elem.nodeType ||
                    (null != e.elem[e.prop] && null == e.elem.style[e.prop])
                    ? e.elem[e.prop]
                    : (t = T.css(e.elem, e.prop, '')) && 'auto' !== t
                    ? t
                    : 0
                },
                set: function (e) {
                  T.fx.step[e.prop]
                    ? T.fx.step[e.prop](e)
                    : 1 !== e.elem.nodeType ||
                      (!T.cssHooks[e.prop] && null == e.elem.style[Ke(e.prop)])
                    ? (e.elem[e.prop] = e.now)
                    : T.style(e.elem, e.prop, e.now + e.unit)
                },
              },
            }),
            (it.propHooks.scrollTop = it.propHooks.scrollLeft = {
              set: function (e) {
                e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
              },
            }),
            (T.easing = {
              linear: function (e) {
                return e
              },
              swing: function (e) {
                return 0.5 - Math.cos(e * Math.PI) / 2
              },
              _default: 'swing',
            }),
            (T.fx = it.prototype.init),
            (T.fx.step = {})
          var rt,
            ot,
            st = /^(?:toggle|show|hide)$/,
            at = /queueHooks$/
          function lt() {
            ot &&
              (!1 === b.hidden && i.requestAnimationFrame
                ? i.requestAnimationFrame(lt)
                : i.setTimeout(lt, T.fx.interval),
              T.fx.tick())
          }
          function ct() {
            return (
              i.setTimeout(function () {
                rt = void 0
              }),
              (rt = Date.now())
            )
          }
          function ut(e, t) {
            var n,
              i = 0,
              r = { height: e }
            for (t = t ? 1 : 0; i < 4; i += 2 - t)
              r['margin' + (n = oe[i])] = r['padding' + n] = e
            return t && (r.opacity = r.width = e), r
          }
          function dt(e, t, n) {
            for (
              var i,
                r = (ft.tweeners[t] || []).concat(ft.tweeners['*']),
                o = 0,
                s = r.length;
              o < s;
              o++
            )
              if ((i = r[o].call(n, t, e))) return i
          }
          function ft(e, t, n) {
            var i,
              r,
              o = 0,
              s = ft.prefilters.length,
              a = T.Deferred().always(function () {
                delete l.elem
              }),
              l = function () {
                if (r) return !1
                for (
                  var t = rt || ct(),
                    n = Math.max(0, c.startTime + c.duration - t),
                    i = 1 - (n / c.duration || 0),
                    o = 0,
                    s = c.tweens.length;
                  o < s;
                  o++
                )
                  c.tweens[o].run(i)
                return (
                  a.notifyWith(e, [c, i, n]),
                  i < 1 && s
                    ? n
                    : (s || a.notifyWith(e, [c, 1, 0]),
                      a.resolveWith(e, [c]),
                      !1)
                )
              },
              c = a.promise({
                elem: e,
                props: T.extend({}, t),
                opts: T.extend(
                  !0,
                  { specialEasing: {}, easing: T.easing._default },
                  n,
                ),
                originalProperties: t,
                originalOptions: n,
                startTime: rt || ct(),
                duration: n.duration,
                tweens: [],
                createTween: function (t, n) {
                  var i = T.Tween(
                    e,
                    c.opts,
                    t,
                    n,
                    c.opts.specialEasing[t] || c.opts.easing,
                  )
                  return c.tweens.push(i), i
                },
                stop: function (t) {
                  var n = 0,
                    i = t ? c.tweens.length : 0
                  if (r) return this
                  for (r = !0; n < i; n++) c.tweens[n].run(1)
                  return (
                    t
                      ? (a.notifyWith(e, [c, 1, 0]), a.resolveWith(e, [c, t]))
                      : a.rejectWith(e, [c, t]),
                    this
                  )
                },
              }),
              u = c.props
            for (
              (function (e, t) {
                var n, i, r, o, s
                for (n in e)
                  if (
                    ((r = t[(i = K(n))]),
                    (o = e[n]),
                    Array.isArray(o) && ((r = o[1]), (o = e[n] = o[0])),
                    n !== i && ((e[i] = o), delete e[n]),
                    (s = T.cssHooks[i]) && ('expand' in s))
                  )
                    for (n in ((o = s.expand(o)), delete e[i], o))
                      (n in e) || ((e[n] = o[n]), (t[n] = r))
                  else t[i] = r
              })(u, c.opts.specialEasing);
              o < s;
              o++
            )
              if ((i = ft.prefilters[o].call(c, e, u, c.opts)))
                return (
                  v(i.stop) &&
                    (T._queueHooks(c.elem, c.opts.queue).stop = i.stop.bind(i)),
                  i
                )
            return (
              T.map(u, dt, c),
              v(c.opts.start) && c.opts.start.call(e, c),
              c
                .progress(c.opts.progress)
                .done(c.opts.done, c.opts.complete)
                .fail(c.opts.fail)
                .always(c.opts.always),
              T.fx.timer(
                T.extend(l, { elem: e, anim: c, queue: c.opts.queue }),
              ),
              c
            )
          }
          ;(T.Animation = T.extend(ft, {
            tweeners: {
              '*': [
                function (e, t) {
                  var n = this.createTween(e, t)
                  return ue(n.elem, e, re.exec(t), n), n
                },
              ],
            },
            tweener: function (e, t) {
              v(e) ? ((t = e), (e = ['*'])) : (e = e.match(M))
              for (var n, i = 0, r = e.length; i < r; i++)
                (n = e[i]),
                  (ft.tweeners[n] = ft.tweeners[n] || []),
                  ft.tweeners[n].unshift(t)
            },
            prefilters: [
              function (e, t, n) {
                var i,
                  r,
                  o,
                  s,
                  a,
                  l,
                  c,
                  u,
                  d = 'width' in t || 'height' in t,
                  f = this,
                  p = {},
                  h = e.style,
                  g = e.nodeType && ce(e),
                  m = G.get(e, 'fxshow')
                for (i in (n.queue ||
                  (null == (s = T._queueHooks(e, 'fx')).unqueued &&
                    ((s.unqueued = 0),
                    (a = s.empty.fire),
                    (s.empty.fire = function () {
                      s.unqueued || a()
                    })),
                  s.unqueued++,
                  f.always(function () {
                    f.always(function () {
                      s.unqueued--, T.queue(e, 'fx').length || s.empty.fire()
                    })
                  })),
                t))
                  if (((r = t[i]), st.test(r))) {
                    if (
                      (delete t[i],
                      (o = o || 'toggle' === r),
                      r === (g ? 'hide' : 'show'))
                    ) {
                      if ('show' !== r || !m || void 0 === m[i]) continue
                      g = !0
                    }
                    p[i] = (m && m[i]) || T.style(e, i)
                  }
                if ((l = !T.isEmptyObject(t)) || !T.isEmptyObject(p))
                  for (i in (d &&
                    1 === e.nodeType &&
                    ((n.overflow = [h.overflow, h.overflowX, h.overflowY]),
                    null == (c = m && m.display) && (c = G.get(e, 'display')),
                    'none' === (u = T.css(e, 'display')) &&
                      (c
                        ? (u = c)
                        : (pe([e], !0),
                          (c = e.style.display || c),
                          (u = T.css(e, 'display')),
                          pe([e]))),
                    ('inline' === u || ('inline-block' === u && null != c)) &&
                      'none' === T.css(e, 'float') &&
                      (l ||
                        (f.done(function () {
                          h.display = c
                        }),
                        null == c &&
                          ((u = h.display), (c = 'none' === u ? '' : u))),
                      (h.display = 'inline-block'))),
                  n.overflow &&
                    ((h.overflow = 'hidden'),
                    f.always(function () {
                      ;(h.overflow = n.overflow[0]),
                        (h.overflowX = n.overflow[1]),
                        (h.overflowY = n.overflow[2])
                    })),
                  (l = !1),
                  p))
                    l ||
                      (m
                        ? 'hidden' in m && (g = m.hidden)
                        : (m = G.access(e, 'fxshow', { display: c })),
                      o && (m.hidden = !g),
                      g && pe([e], !0),
                      f.done(function () {
                        for (i in (g || pe([e]), G.remove(e, 'fxshow'), p))
                          T.style(e, i, p[i])
                      })),
                      (l = dt(g ? m[i] : 0, i, f)),
                      i in m ||
                        ((m[i] = l.start),
                        g && ((l.end = l.start), (l.start = 0)))
              },
            ],
            prefilter: function (e, t) {
              t ? ft.prefilters.unshift(e) : ft.prefilters.push(e)
            },
          })),
            (T.speed = function (e, t, n) {
              var i =
                e && 'object' == typeof e
                  ? T.extend({}, e)
                  : {
                      complete: n || (!n && t) || (v(e) && e),
                      duration: e,
                      easing: (n && t) || (t && !v(t) && t),
                    }
              return (
                T.fx.off
                  ? (i.duration = 0)
                  : 'number' != typeof i.duration &&
                    (i.duration in T.fx.speeds
                      ? (i.duration = T.fx.speeds[i.duration])
                      : (i.duration = T.fx.speeds._default)),
                (null != i.queue && !0 !== i.queue) || (i.queue = 'fx'),
                (i.old = i.complete),
                (i.complete = function () {
                  v(i.old) && i.old.call(this),
                    i.queue && T.dequeue(this, i.queue)
                }),
                i
              )
            }),
            T.fn.extend({
              fadeTo: function (e, t, n, i) {
                return this.filter(ce)
                  .css('opacity', 0)
                  .show()
                  .end()
                  .animate({ opacity: t }, e, n, i)
              },
              animate: function (e, t, n, i) {
                var r = T.isEmptyObject(e),
                  o = T.speed(t, n, i),
                  s = function () {
                    var t = ft(this, T.extend({}, e), o)
                    ;(r || G.get(this, 'finish')) && t.stop(!0)
                  }
                return (
                  (s.finish = s),
                  r || !1 === o.queue ? this.each(s) : this.queue(o.queue, s)
                )
              },
              stop: function (e, t, n) {
                var i = function (e) {
                  var t = e.stop
                  delete e.stop, t(n)
                }
                return (
                  'string' != typeof e && ((n = t), (t = e), (e = void 0)),
                  t && this.queue(e || 'fx', []),
                  this.each(function () {
                    var t = !0,
                      r = null != e && e + 'queueHooks',
                      o = T.timers,
                      s = G.get(this)
                    if (r) s[r] && s[r].stop && i(s[r])
                    else for (r in s) s[r] && s[r].stop && at.test(r) && i(s[r])
                    for (r = o.length; r--; )
                      o[r].elem !== this ||
                        (null != e && o[r].queue !== e) ||
                        (o[r].anim.stop(n), (t = !1), o.splice(r, 1))
                    ;(!t && n) || T.dequeue(this, e)
                  })
                )
              },
              finish: function (e) {
                return (
                  !1 !== e && (e = e || 'fx'),
                  this.each(function () {
                    var t,
                      n = G.get(this),
                      i = n[e + 'queue'],
                      r = n[e + 'queueHooks'],
                      o = T.timers,
                      s = i ? i.length : 0
                    for (
                      n.finish = !0,
                        T.queue(this, e, []),
                        r && r.stop && r.stop.call(this, !0),
                        t = o.length;
                      t--;

                    )
                      o[t].elem === this &&
                        o[t].queue === e &&
                        (o[t].anim.stop(!0), o.splice(t, 1))
                    for (t = 0; t < s; t++)
                      i[t] && i[t].finish && i[t].finish.call(this)
                    delete n.finish
                  })
                )
              },
            }),
            T.each(['toggle', 'show', 'hide'], function (e, t) {
              var n = T.fn[t]
              T.fn[t] = function (e, i, r) {
                return null == e || 'boolean' == typeof e
                  ? n.apply(this, arguments)
                  : this.animate(ut(t, !0), e, i, r)
              }
            }),
            T.each(
              {
                slideDown: ut('show'),
                slideUp: ut('hide'),
                slideToggle: ut('toggle'),
                fadeIn: { opacity: 'show' },
                fadeOut: { opacity: 'hide' },
                fadeToggle: { opacity: 'toggle' },
              },
              function (e, t) {
                T.fn[e] = function (e, n, i) {
                  return this.animate(t, e, n, i)
                }
              },
            ),
            (T.timers = []),
            (T.fx.tick = function () {
              var e,
                t = 0,
                n = T.timers
              for (rt = Date.now(); t < n.length; t++)
                (e = n[t])() || n[t] !== e || n.splice(t--, 1)
              n.length || T.fx.stop(), (rt = void 0)
            }),
            (T.fx.timer = function (e) {
              T.timers.push(e), T.fx.start()
            }),
            (T.fx.interval = 13),
            (T.fx.start = function () {
              ot || ((ot = !0), lt())
            }),
            (T.fx.stop = function () {
              ot = null
            }),
            (T.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
            (T.fn.delay = function (e, t) {
              return (
                (e = (T.fx && T.fx.speeds[e]) || e),
                (t = t || 'fx'),
                this.queue(t, function (t, n) {
                  var r = i.setTimeout(t, e)
                  n.stop = function () {
                    i.clearTimeout(r)
                  }
                })
              )
            }),
            (function () {
              var e = b.createElement('input'),
                t = b
                  .createElement('select')
                  .appendChild(b.createElement('option'))
              ;(e.type = 'checkbox'),
                (m.checkOn = '' !== e.value),
                (m.optSelected = t.selected),
                ((e = b.createElement('input')).value = 't'),
                (e.type = 'radio'),
                (m.radioValue = 't' === e.value)
            })()
          var pt,
            ht = T.expr.attrHandle
          T.fn.extend({
            attr: function (e, t) {
              return U(this, T.attr, e, t, arguments.length > 1)
            },
            removeAttr: function (e) {
              return this.each(function () {
                T.removeAttr(this, e)
              })
            },
          }),
            T.extend({
              attr: function (e, t, n) {
                var i,
                  r,
                  o = e.nodeType
                if (3 !== o && 8 !== o && 2 !== o)
                  return void 0 === e.getAttribute
                    ? T.prop(e, t, n)
                    : ((1 === o && T.isXMLDoc(e)) ||
                        (r =
                          T.attrHooks[t.toLowerCase()] ||
                          (T.expr.match.bool.test(t) ? pt : void 0)),
                      void 0 !== n
                        ? null === n
                          ? void T.removeAttr(e, t)
                          : r && 'set' in r && void 0 !== (i = r.set(e, n, t))
                          ? i
                          : (e.setAttribute(t, n + ''), n)
                        : r && 'get' in r && null !== (i = r.get(e, t))
                        ? i
                        : null == (i = T.find.attr(e, t))
                        ? void 0
                        : i)
              },
              attrHooks: {
                type: {
                  set: function (e, t) {
                    if (!m.radioValue && 'radio' === t && D(e, 'input')) {
                      var n = e.value
                      return e.setAttribute('type', t), n && (e.value = n), t
                    }
                  },
                },
              },
              removeAttr: function (e, t) {
                var n,
                  i = 0,
                  r = t && t.match(M)
                if (r && 1 === e.nodeType)
                  for (; (n = r[i++]); ) e.removeAttribute(n)
              },
            }),
            (pt = {
              set: function (e, t, n) {
                return !1 === t ? T.removeAttr(e, n) : e.setAttribute(n, n), n
              },
            }),
            T.each(T.expr.match.bool.source.match(/\w+/g), function (e, t) {
              var n = ht[t] || T.find.attr
              ht[t] = function (e, t, i) {
                var r,
                  o,
                  s = t.toLowerCase()
                return (
                  i ||
                    ((o = ht[s]),
                    (ht[s] = r),
                    (r = null != n(e, t, i) ? s : null),
                    (ht[s] = o)),
                  r
                )
              }
            })
          var gt = /^(?:input|select|textarea|button)$/i,
            mt = /^(?:a|area)$/i
          function vt(e) {
            return (e.match(M) || []).join(' ')
          }
          function yt(e) {
            return (e.getAttribute && e.getAttribute('class')) || ''
          }
          function bt(e) {
            return Array.isArray(e)
              ? e
              : ('string' == typeof e && e.match(M)) || []
          }
          T.fn.extend({
            prop: function (e, t) {
              return U(this, T.prop, e, t, arguments.length > 1)
            },
            removeProp: function (e) {
              return this.each(function () {
                delete this[T.propFix[e] || e]
              })
            },
          }),
            T.extend({
              prop: function (e, t, n) {
                var i,
                  r,
                  o = e.nodeType
                if (3 !== o && 8 !== o && 2 !== o)
                  return (
                    (1 === o && T.isXMLDoc(e)) ||
                      ((t = T.propFix[t] || t), (r = T.propHooks[t])),
                    void 0 !== n
                      ? r && 'set' in r && void 0 !== (i = r.set(e, n, t))
                        ? i
                        : (e[t] = n)
                      : r && 'get' in r && null !== (i = r.get(e, t))
                      ? i
                      : e[t]
                  )
              },
              propHooks: {
                tabIndex: {
                  get: function (e) {
                    var t = T.find.attr(e, 'tabindex')
                    return t
                      ? parseInt(t, 10)
                      : gt.test(e.nodeName) || (mt.test(e.nodeName) && e.href)
                      ? 0
                      : -1
                  },
                },
              },
              propFix: { for: 'htmlFor', class: 'className' },
            }),
            m.optSelected ||
              (T.propHooks.selected = {
                get: function (e) {
                  var t = e.parentNode
                  return t && t.parentNode && t.parentNode.selectedIndex, null
                },
                set: function (e) {
                  var t = e.parentNode
                  t &&
                    (t.selectedIndex,
                    t.parentNode && t.parentNode.selectedIndex)
                },
              }),
            T.each(
              [
                'tabIndex',
                'readOnly',
                'maxLength',
                'cellSpacing',
                'cellPadding',
                'rowSpan',
                'colSpan',
                'useMap',
                'frameBorder',
                'contentEditable',
              ],
              function () {
                T.propFix[this.toLowerCase()] = this
              },
            ),
            T.fn.extend({
              addClass: function (e) {
                var t,
                  n,
                  i,
                  r,
                  o,
                  s,
                  a,
                  l = 0
                if (v(e))
                  return this.each(function (t) {
                    T(this).addClass(e.call(this, t, yt(this)))
                  })
                if ((t = bt(e)).length)
                  for (; (n = this[l++]); )
                    if (
                      ((r = yt(n)), (i = 1 === n.nodeType && ' ' + vt(r) + ' '))
                    ) {
                      for (s = 0; (o = t[s++]); )
                        i.indexOf(' ' + o + ' ') < 0 && (i += o + ' ')
                      r !== (a = vt(i)) && n.setAttribute('class', a)
                    }
                return this
              },
              removeClass: function (e) {
                var t,
                  n,
                  i,
                  r,
                  o,
                  s,
                  a,
                  l = 0
                if (v(e))
                  return this.each(function (t) {
                    T(this).removeClass(e.call(this, t, yt(this)))
                  })
                if (!arguments.length) return this.attr('class', '')
                if ((t = bt(e)).length)
                  for (; (n = this[l++]); )
                    if (
                      ((r = yt(n)), (i = 1 === n.nodeType && ' ' + vt(r) + ' '))
                    ) {
                      for (s = 0; (o = t[s++]); )
                        for (; i.indexOf(' ' + o + ' ') > -1; )
                          i = i.replace(' ' + o + ' ', ' ')
                      r !== (a = vt(i)) && n.setAttribute('class', a)
                    }
                return this
              },
              toggleClass: function (e, t) {
                var n = typeof e,
                  i = 'string' === n || Array.isArray(e)
                return 'boolean' == typeof t && i
                  ? t
                    ? this.addClass(e)
                    : this.removeClass(e)
                  : v(e)
                  ? this.each(function (n) {
                      T(this).toggleClass(e.call(this, n, yt(this), t), t)
                    })
                  : this.each(function () {
                      var t, r, o, s
                      if (i)
                        for (r = 0, o = T(this), s = bt(e); (t = s[r++]); )
                          o.hasClass(t) ? o.removeClass(t) : o.addClass(t)
                      else
                        (void 0 !== e && 'boolean' !== n) ||
                          ((t = yt(this)) && G.set(this, '__className__', t),
                          this.setAttribute &&
                            this.setAttribute(
                              'class',
                              t || !1 === e
                                ? ''
                                : G.get(this, '__className__') || '',
                            ))
                    })
              },
              hasClass: function (e) {
                var t,
                  n,
                  i = 0
                for (t = ' ' + e + ' '; (n = this[i++]); )
                  if (
                    1 === n.nodeType &&
                    (' ' + vt(yt(n)) + ' ').indexOf(t) > -1
                  )
                    return !0
                return !1
              },
            })
          var _t = /\r/g
          T.fn.extend({
            val: function (e) {
              var t,
                n,
                i,
                r = this[0]
              return arguments.length
                ? ((i = v(e)),
                  this.each(function (n) {
                    var r
                    1 === this.nodeType &&
                      (null == (r = i ? e.call(this, n, T(this).val()) : e)
                        ? (r = '')
                        : 'number' == typeof r
                        ? (r += '')
                        : Array.isArray(r) &&
                          (r = T.map(r, function (e) {
                            return null == e ? '' : e + ''
                          })),
                      ((t =
                        T.valHooks[this.type] ||
                        T.valHooks[this.nodeName.toLowerCase()]) &&
                        'set' in t &&
                        void 0 !== t.set(this, r, 'value')) ||
                        (this.value = r))
                  }))
                : r
                ? (t =
                    T.valHooks[r.type] ||
                    T.valHooks[r.nodeName.toLowerCase()]) &&
                  'get' in t &&
                  void 0 !== (n = t.get(r, 'value'))
                  ? n
                  : 'string' == typeof (n = r.value)
                  ? n.replace(_t, '')
                  : null == n
                  ? ''
                  : n
                : void 0
            },
          }),
            T.extend({
              valHooks: {
                option: {
                  get: function (e) {
                    var t = T.find.attr(e, 'value')
                    return null != t ? t : vt(T.text(e))
                  },
                },
                select: {
                  get: function (e) {
                    var t,
                      n,
                      i,
                      r = e.options,
                      o = e.selectedIndex,
                      s = 'select-one' === e.type,
                      a = s ? null : [],
                      l = s ? o + 1 : r.length
                    for (i = o < 0 ? l : s ? o : 0; i < l; i++)
                      if (
                        ((n = r[i]).selected || i === o) &&
                        !n.disabled &&
                        (!n.parentNode.disabled || !D(n.parentNode, 'optgroup'))
                      ) {
                        if (((t = T(n).val()), s)) return t
                        a.push(t)
                      }
                    return a
                  },
                  set: function (e, t) {
                    for (
                      var n, i, r = e.options, o = T.makeArray(t), s = r.length;
                      s--;

                    )
                      ((i = r[s]).selected =
                        T.inArray(T.valHooks.option.get(i), o) > -1) && (n = !0)
                    return n || (e.selectedIndex = -1), o
                  },
                },
              },
            }),
            T.each(['radio', 'checkbox'], function () {
              ;(T.valHooks[this] = {
                set: function (e, t) {
                  if (Array.isArray(t))
                    return (e.checked = T.inArray(T(e).val(), t) > -1)
                },
              }),
                m.checkOn ||
                  (T.valHooks[this].get = function (e) {
                    return null === e.getAttribute('value') ? 'on' : e.value
                  })
            }),
            (m.focusin = 'onfocusin' in i)
          var wt = /^(?:focusinfocus|focusoutblur)$/,
            xt = function (e) {
              e.stopPropagation()
            }
          T.extend(T.event, {
            trigger: function (e, t, n, r) {
              var o,
                s,
                a,
                l,
                c,
                u,
                d,
                f,
                h = [n || b],
                g = p.call(e, 'type') ? e.type : e,
                m = p.call(e, 'namespace') ? e.namespace.split('.') : []
              if (
                ((s = f = a = n = n || b),
                3 !== n.nodeType &&
                  8 !== n.nodeType &&
                  !wt.test(g + T.event.triggered) &&
                  (g.indexOf('.') > -1 &&
                    ((m = g.split('.')), (g = m.shift()), m.sort()),
                  (c = g.indexOf(':') < 0 && 'on' + g),
                  ((e = e[T.expando]
                    ? e
                    : new T.Event(g, 'object' == typeof e && e)).isTrigger = r
                    ? 2
                    : 3),
                  (e.namespace = m.join('.')),
                  (e.rnamespace = e.namespace
                    ? new RegExp(
                        '(^|\\.)' + m.join('\\.(?:.*\\.|)') + '(\\.|$)',
                      )
                    : null),
                  (e.result = void 0),
                  e.target || (e.target = n),
                  (t = null == t ? [e] : T.makeArray(t, [e])),
                  (d = T.event.special[g] || {}),
                  r || !d.trigger || !1 !== d.trigger.apply(n, t)))
              ) {
                if (!r && !d.noBubble && !y(n)) {
                  for (
                    l = d.delegateType || g,
                      wt.test(l + g) || (s = s.parentNode);
                    s;
                    s = s.parentNode
                  )
                    h.push(s), (a = s)
                  a === (n.ownerDocument || b) &&
                    h.push(a.defaultView || a.parentWindow || i)
                }
                for (o = 0; (s = h[o++]) && !e.isPropagationStopped(); )
                  (f = s),
                    (e.type = o > 1 ? l : d.bindType || g),
                    (u =
                      (G.get(s, 'events') || Object.create(null))[e.type] &&
                      G.get(s, 'handle')) && u.apply(s, t),
                    (u = c && s[c]) &&
                      u.apply &&
                      Q(s) &&
                      ((e.result = u.apply(s, t)),
                      !1 === e.result && e.preventDefault())
                return (
                  (e.type = g),
                  r ||
                    e.isDefaultPrevented() ||
                    (d._default && !1 !== d._default.apply(h.pop(), t)) ||
                    !Q(n) ||
                    (c &&
                      v(n[g]) &&
                      !y(n) &&
                      ((a = n[c]) && (n[c] = null),
                      (T.event.triggered = g),
                      e.isPropagationStopped() && f.addEventListener(g, xt),
                      n[g](),
                      e.isPropagationStopped() && f.removeEventListener(g, xt),
                      (T.event.triggered = void 0),
                      a && (n[c] = a))),
                  e.result
                )
              }
            },
            simulate: function (e, t, n) {
              var i = T.extend(new T.Event(), n, { type: e, isSimulated: !0 })
              T.event.trigger(i, null, t)
            },
          }),
            T.fn.extend({
              trigger: function (e, t) {
                return this.each(function () {
                  T.event.trigger(e, t, this)
                })
              },
              triggerHandler: function (e, t) {
                var n = this[0]
                if (n) return T.event.trigger(e, t, n, !0)
              },
            }),
            m.focusin ||
              T.each({ focus: 'focusin', blur: 'focusout' }, function (e, t) {
                var n = function (e) {
                  T.event.simulate(t, e.target, T.event.fix(e))
                }
                T.event.special[t] = {
                  setup: function () {
                    var i = this.ownerDocument || this.document || this,
                      r = G.access(i, t)
                    r || i.addEventListener(e, n, !0),
                      G.access(i, t, (r || 0) + 1)
                  },
                  teardown: function () {
                    var i = this.ownerDocument || this.document || this,
                      r = G.access(i, t) - 1
                    r
                      ? G.access(i, t, r)
                      : (i.removeEventListener(e, n, !0), G.remove(i, t))
                  },
                }
              })
          var Et = i.location,
            Tt = { guid: Date.now() },
            Ct = /\?/
          T.parseXML = function (e) {
            var t, n
            if (!e || 'string' != typeof e) return null
            try {
              t = new i.DOMParser().parseFromString(e, 'text/xml')
            } catch (e) {}
            return (
              (n = t && t.getElementsByTagName('parsererror')[0]),
              (t && !n) ||
                T.error(
                  'Invalid XML: ' +
                    (n
                      ? T.map(n.childNodes, function (e) {
                          return e.textContent
                        }).join('\n')
                      : e),
                ),
              t
            )
          }
          var At = /\[\]$/,
            kt = /\r?\n/g,
            St = /^(?:submit|button|image|reset|file)$/i,
            Ot = /^(?:input|select|textarea|keygen)/i
          function Dt(e, t, n, i) {
            var r
            if (Array.isArray(t))
              T.each(t, function (t, r) {
                n || At.test(e)
                  ? i(e, r)
                  : Dt(
                      e +
                        '[' +
                        ('object' == typeof r && null != r ? t : '') +
                        ']',
                      r,
                      n,
                      i,
                    )
              })
            else if (n || 'object' !== x(t)) i(e, t)
            else for (r in t) Dt(e + '[' + r + ']', t[r], n, i)
          }
          ;(T.param = function (e, t) {
            var n,
              i = [],
              r = function (e, t) {
                var n = v(t) ? t() : t
                i[i.length] =
                  encodeURIComponent(e) +
                  '=' +
                  encodeURIComponent(null == n ? '' : n)
              }
            if (null == e) return ''
            if (Array.isArray(e) || (e.jquery && !T.isPlainObject(e)))
              T.each(e, function () {
                r(this.name, this.value)
              })
            else for (n in e) Dt(n, e[n], t, r)
            return i.join('&')
          }),
            T.fn.extend({
              serialize: function () {
                return T.param(this.serializeArray())
              },
              serializeArray: function () {
                return this.map(function () {
                  var e = T.prop(this, 'elements')
                  return e ? T.makeArray(e) : this
                })
                  .filter(function () {
                    var e = this.type
                    return (
                      this.name &&
                      !T(this).is(':disabled') &&
                      Ot.test(this.nodeName) &&
                      !St.test(e) &&
                      (this.checked || !me.test(e))
                    )
                  })
                  .map(function (e, t) {
                    var n = T(this).val()
                    return null == n
                      ? null
                      : Array.isArray(n)
                      ? T.map(n, function (e) {
                          return { name: t.name, value: e.replace(kt, '\r\n') }
                        })
                      : { name: t.name, value: n.replace(kt, '\r\n') }
                  })
                  .get()
              },
            })
          var Nt = /%20/g,
            Lt = /#.*$/,
            jt = /([?&])_=[^&]*/,
            $t = /^(.*?):[ \t]*([^\r\n]*)$/gm,
            Pt = /^(?:GET|HEAD)$/,
            It = /^\/\//,
            Ht = {},
            Mt = {},
            qt = '*/'.concat('*'),
            Rt = b.createElement('a')
          function Bt(e) {
            return function (t, n) {
              'string' != typeof t && ((n = t), (t = '*'))
              var i,
                r = 0,
                o = t.toLowerCase().match(M) || []
              if (v(n))
                for (; (i = o[r++]); )
                  '+' === i[0]
                    ? ((i = i.slice(1) || '*'), (e[i] = e[i] || []).unshift(n))
                    : (e[i] = e[i] || []).push(n)
            }
          }
          function Wt(e, t, n, i) {
            var r = {},
              o = e === Mt
            function s(a) {
              var l
              return (
                (r[a] = !0),
                T.each(e[a] || [], function (e, a) {
                  var c = a(t, n, i)
                  return 'string' != typeof c || o || r[c]
                    ? o
                      ? !(l = c)
                      : void 0
                    : (t.dataTypes.unshift(c), s(c), !1)
                }),
                l
              )
            }
            return s(t.dataTypes[0]) || (!r['*'] && s('*'))
          }
          function Ft(e, t) {
            var n,
              i,
              r = T.ajaxSettings.flatOptions || {}
            for (n in t)
              void 0 !== t[n] && ((r[n] ? e : i || (i = {}))[n] = t[n])
            return i && T.extend(!0, e, i), e
          }
          ;(Rt.href = Et.href),
            T.extend({
              active: 0,
              lastModified: {},
              etag: {},
              ajaxSettings: {
                url: Et.href,
                type: 'GET',
                isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(
                  Et.protocol,
                ),
                global: !0,
                processData: !0,
                async: !0,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                accepts: {
                  '*': qt,
                  text: 'text/plain',
                  html: 'text/html',
                  xml: 'application/xml, text/xml',
                  json: 'application/json, text/javascript',
                },
                contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ },
                responseFields: {
                  xml: 'responseXML',
                  text: 'responseText',
                  json: 'responseJSON',
                },
                converters: {
                  '* text': String,
                  'text html': !0,
                  'text json': JSON.parse,
                  'text xml': T.parseXML,
                },
                flatOptions: { url: !0, context: !0 },
              },
              ajaxSetup: function (e, t) {
                return t ? Ft(Ft(e, T.ajaxSettings), t) : Ft(T.ajaxSettings, e)
              },
              ajaxPrefilter: Bt(Ht),
              ajaxTransport: Bt(Mt),
              ajax: function (e, t) {
                'object' == typeof e && ((t = e), (e = void 0)), (t = t || {})
                var n,
                  r,
                  o,
                  s,
                  a,
                  l,
                  c,
                  u,
                  d,
                  f,
                  p = T.ajaxSetup({}, t),
                  h = p.context || p,
                  g = p.context && (h.nodeType || h.jquery) ? T(h) : T.event,
                  m = T.Deferred(),
                  v = T.Callbacks('once memory'),
                  y = p.statusCode || {},
                  _ = {},
                  w = {},
                  x = 'canceled',
                  E = {
                    readyState: 0,
                    getResponseHeader: function (e) {
                      var t
                      if (c) {
                        if (!s)
                          for (s = {}; (t = $t.exec(o)); )
                            s[t[1].toLowerCase() + ' '] = (
                              s[t[1].toLowerCase() + ' '] || []
                            ).concat(t[2])
                        t = s[e.toLowerCase() + ' ']
                      }
                      return null == t ? null : t.join(', ')
                    },
                    getAllResponseHeaders: function () {
                      return c ? o : null
                    },
                    setRequestHeader: function (e, t) {
                      return (
                        null == c &&
                          ((e = w[e.toLowerCase()] = w[e.toLowerCase()] || e),
                          (_[e] = t)),
                        this
                      )
                    },
                    overrideMimeType: function (e) {
                      return null == c && (p.mimeType = e), this
                    },
                    statusCode: function (e) {
                      var t
                      if (e)
                        if (c) E.always(e[E.status])
                        else for (t in e) y[t] = [y[t], e[t]]
                      return this
                    },
                    abort: function (e) {
                      var t = e || x
                      return n && n.abort(t), C(0, t), this
                    },
                  }
                if (
                  (m.promise(E),
                  (p.url = ((e || p.url || Et.href) + '').replace(
                    It,
                    Et.protocol + '//',
                  )),
                  (p.type = t.method || t.type || p.method || p.type),
                  (p.dataTypes = (p.dataType || '*').toLowerCase().match(M) || [
                    '',
                  ]),
                  null == p.crossDomain)
                ) {
                  l = b.createElement('a')
                  try {
                    ;(l.href = p.url),
                      (l.href = l.href),
                      (p.crossDomain =
                        Rt.protocol + '//' + Rt.host !=
                        l.protocol + '//' + l.host)
                  } catch (e) {
                    p.crossDomain = !0
                  }
                }
                if (
                  (p.data &&
                    p.processData &&
                    'string' != typeof p.data &&
                    (p.data = T.param(p.data, p.traditional)),
                  Wt(Ht, p, t, E),
                  c)
                )
                  return E
                for (d in ((u = T.event && p.global) &&
                  0 == T.active++ &&
                  T.event.trigger('ajaxStart'),
                (p.type = p.type.toUpperCase()),
                (p.hasContent = !Pt.test(p.type)),
                (r = p.url.replace(Lt, '')),
                p.hasContent
                  ? p.data &&
                    p.processData &&
                    0 ===
                      (p.contentType || '').indexOf(
                        'application/x-www-form-urlencoded',
                      ) &&
                    (p.data = p.data.replace(Nt, '+'))
                  : ((f = p.url.slice(r.length)),
                    p.data &&
                      (p.processData || 'string' == typeof p.data) &&
                      ((r += (Ct.test(r) ? '&' : '?') + p.data), delete p.data),
                    !1 === p.cache &&
                      ((r = r.replace(jt, '$1')),
                      (f = (Ct.test(r) ? '&' : '?') + '_=' + Tt.guid++ + f)),
                    (p.url = r + f)),
                p.ifModified &&
                  (T.lastModified[r] &&
                    E.setRequestHeader('If-Modified-Since', T.lastModified[r]),
                  T.etag[r] && E.setRequestHeader('If-None-Match', T.etag[r])),
                ((p.data && p.hasContent && !1 !== p.contentType) ||
                  t.contentType) &&
                  E.setRequestHeader('Content-Type', p.contentType),
                E.setRequestHeader(
                  'Accept',
                  p.dataTypes[0] && p.accepts[p.dataTypes[0]]
                    ? p.accepts[p.dataTypes[0]] +
                        ('*' !== p.dataTypes[0] ? ', ' + qt + '; q=0.01' : '')
                    : p.accepts['*'],
                ),
                p.headers))
                  E.setRequestHeader(d, p.headers[d])
                if (p.beforeSend && (!1 === p.beforeSend.call(h, E, p) || c))
                  return E.abort()
                if (
                  ((x = 'abort'),
                  v.add(p.complete),
                  E.done(p.success),
                  E.fail(p.error),
                  (n = Wt(Mt, p, t, E)))
                ) {
                  if (
                    ((E.readyState = 1), u && g.trigger('ajaxSend', [E, p]), c)
                  )
                    return E
                  p.async &&
                    p.timeout > 0 &&
                    (a = i.setTimeout(function () {
                      E.abort('timeout')
                    }, p.timeout))
                  try {
                    ;(c = !1), n.send(_, C)
                  } catch (e) {
                    if (c) throw e
                    C(-1, e)
                  }
                } else C(-1, 'No Transport')
                function C(e, t, s, l) {
                  var d,
                    f,
                    b,
                    _,
                    w,
                    x = t
                  c ||
                    ((c = !0),
                    a && i.clearTimeout(a),
                    (n = void 0),
                    (o = l || ''),
                    (E.readyState = e > 0 ? 4 : 0),
                    (d = (e >= 200 && e < 300) || 304 === e),
                    s &&
                      (_ = (function (e, t, n) {
                        for (
                          var i, r, o, s, a = e.contents, l = e.dataTypes;
                          '*' === l[0];

                        )
                          l.shift(),
                            void 0 === i &&
                              (i =
                                e.mimeType ||
                                t.getResponseHeader('Content-Type'))
                        if (i)
                          for (r in a)
                            if (a[r] && a[r].test(i)) {
                              l.unshift(r)
                              break
                            }
                        if (l[0] in n) o = l[0]
                        else {
                          for (r in n) {
                            if (!l[0] || e.converters[r + ' ' + l[0]]) {
                              o = r
                              break
                            }
                            s || (s = r)
                          }
                          o = o || s
                        }
                        if (o) return o !== l[0] && l.unshift(o), n[o]
                      })(p, E, s)),
                    !d &&
                      T.inArray('script', p.dataTypes) > -1 &&
                      T.inArray('json', p.dataTypes) < 0 &&
                      (p.converters['text script'] = function () {}),
                    (_ = (function (e, t, n, i) {
                      var r,
                        o,
                        s,
                        a,
                        l,
                        c = {},
                        u = e.dataTypes.slice()
                      if (u[1])
                        for (s in e.converters)
                          c[s.toLowerCase()] = e.converters[s]
                      for (o = u.shift(); o; )
                        if (
                          (e.responseFields[o] && (n[e.responseFields[o]] = t),
                          !l &&
                            i &&
                            e.dataFilter &&
                            (t = e.dataFilter(t, e.dataType)),
                          (l = o),
                          (o = u.shift()))
                        )
                          if ('*' === o) o = l
                          else if ('*' !== l && l !== o) {
                            if (!(s = c[l + ' ' + o] || c['* ' + o]))
                              for (r in c)
                                if (
                                  (a = r.split(' '))[1] === o &&
                                  (s = c[l + ' ' + a[0]] || c['* ' + a[0]])
                                ) {
                                  !0 === s
                                    ? (s = c[r])
                                    : !0 !== c[r] &&
                                      ((o = a[0]), u.unshift(a[1]))
                                  break
                                }
                            if (!0 !== s)
                              if (s && e.throws) t = s(t)
                              else
                                try {
                                  t = s(t)
                                } catch (e) {
                                  return {
                                    state: 'parsererror',
                                    error: s
                                      ? e
                                      : 'No conversion from ' + l + ' to ' + o,
                                  }
                                }
                          }
                      return { state: 'success', data: t }
                    })(p, _, E, d)),
                    d
                      ? (p.ifModified &&
                          ((w = E.getResponseHeader('Last-Modified')) &&
                            (T.lastModified[r] = w),
                          (w = E.getResponseHeader('etag')) && (T.etag[r] = w)),
                        204 === e || 'HEAD' === p.type
                          ? (x = 'nocontent')
                          : 304 === e
                          ? (x = 'notmodified')
                          : ((x = _.state), (f = _.data), (d = !(b = _.error))))
                      : ((b = x),
                        (!e && x) || ((x = 'error'), e < 0 && (e = 0))),
                    (E.status = e),
                    (E.statusText = (t || x) + ''),
                    d
                      ? m.resolveWith(h, [f, x, E])
                      : m.rejectWith(h, [E, x, b]),
                    E.statusCode(y),
                    (y = void 0),
                    u &&
                      g.trigger(d ? 'ajaxSuccess' : 'ajaxError', [
                        E,
                        p,
                        d ? f : b,
                      ]),
                    v.fireWith(h, [E, x]),
                    u &&
                      (g.trigger('ajaxComplete', [E, p]),
                      --T.active || T.event.trigger('ajaxStop')))
                }
                return E
              },
              getJSON: function (e, t, n) {
                return T.get(e, t, n, 'json')
              },
              getScript: function (e, t) {
                return T.get(e, void 0, t, 'script')
              },
            }),
            T.each(['get', 'post'], function (e, t) {
              T[t] = function (e, n, i, r) {
                return (
                  v(n) && ((r = r || i), (i = n), (n = void 0)),
                  T.ajax(
                    T.extend(
                      { url: e, type: t, dataType: r, data: n, success: i },
                      T.isPlainObject(e) && e,
                    ),
                  )
                )
              }
            }),
            T.ajaxPrefilter(function (e) {
              var t
              for (t in e.headers)
                'content-type' === t.toLowerCase() &&
                  (e.contentType = e.headers[t] || '')
            }),
            (T._evalUrl = function (e, t, n) {
              return T.ajax({
                url: e,
                type: 'GET',
                dataType: 'script',
                cache: !0,
                async: !1,
                global: !1,
                converters: { 'text script': function () {} },
                dataFilter: function (e) {
                  T.globalEval(e, t, n)
                },
              })
            }),
            T.fn.extend({
              wrapAll: function (e) {
                var t
                return (
                  this[0] &&
                    (v(e) && (e = e.call(this[0])),
                    (t = T(e, this[0].ownerDocument).eq(0).clone(!0)),
                    this[0].parentNode && t.insertBefore(this[0]),
                    t
                      .map(function () {
                        for (var e = this; e.firstElementChild; )
                          e = e.firstElementChild
                        return e
                      })
                      .append(this)),
                  this
                )
              },
              wrapInner: function (e) {
                return v(e)
                  ? this.each(function (t) {
                      T(this).wrapInner(e.call(this, t))
                    })
                  : this.each(function () {
                      var t = T(this),
                        n = t.contents()
                      n.length ? n.wrapAll(e) : t.append(e)
                    })
              },
              wrap: function (e) {
                var t = v(e)
                return this.each(function (n) {
                  T(this).wrapAll(t ? e.call(this, n) : e)
                })
              },
              unwrap: function (e) {
                return (
                  this.parent(e)
                    .not('body')
                    .each(function () {
                      T(this).replaceWith(this.childNodes)
                    }),
                  this
                )
              },
            }),
            (T.expr.pseudos.hidden = function (e) {
              return !T.expr.pseudos.visible(e)
            }),
            (T.expr.pseudos.visible = function (e) {
              return !!(
                e.offsetWidth ||
                e.offsetHeight ||
                e.getClientRects().length
              )
            }),
            (T.ajaxSettings.xhr = function () {
              try {
                return new i.XMLHttpRequest()
              } catch (e) {}
            })
          var zt = { 0: 200, 1223: 204 },
            Ut = T.ajaxSettings.xhr()
          ;(m.cors = !!Ut && 'withCredentials' in Ut),
            (m.ajax = Ut = !!Ut),
            T.ajaxTransport(function (e) {
              var t, n
              if (m.cors || (Ut && !e.crossDomain))
                return {
                  send: function (r, o) {
                    var s,
                      a = e.xhr()
                    if (
                      (a.open(e.type, e.url, e.async, e.username, e.password),
                      e.xhrFields)
                    )
                      for (s in e.xhrFields) a[s] = e.xhrFields[s]
                    for (s in (e.mimeType &&
                      a.overrideMimeType &&
                      a.overrideMimeType(e.mimeType),
                    e.crossDomain ||
                      r['X-Requested-With'] ||
                      (r['X-Requested-With'] = 'XMLHttpRequest'),
                    r))
                      a.setRequestHeader(s, r[s])
                    ;(t = function (e) {
                      return function () {
                        t &&
                          ((t = n = a.onload = a.onerror = a.onabort = a.ontimeout = a.onreadystatechange = null),
                          'abort' === e
                            ? a.abort()
                            : 'error' === e
                            ? 'number' != typeof a.status
                              ? o(0, 'error')
                              : o(a.status, a.statusText)
                            : o(
                                zt[a.status] || a.status,
                                a.statusText,
                                'text' !== (a.responseType || 'text') ||
                                  'string' != typeof a.responseText
                                  ? { binary: a.response }
                                  : { text: a.responseText },
                                a.getAllResponseHeaders(),
                              ))
                      }
                    }),
                      (a.onload = t()),
                      (n = a.onerror = a.ontimeout = t('error')),
                      void 0 !== a.onabort
                        ? (a.onabort = n)
                        : (a.onreadystatechange = function () {
                            4 === a.readyState &&
                              i.setTimeout(function () {
                                t && n()
                              })
                          }),
                      (t = t('abort'))
                    try {
                      a.send((e.hasContent && e.data) || null)
                    } catch (e) {
                      if (t) throw e
                    }
                  },
                  abort: function () {
                    t && t()
                  },
                }
            }),
            T.ajaxPrefilter(function (e) {
              e.crossDomain && (e.contents.script = !1)
            }),
            T.ajaxSetup({
              accepts: {
                script:
                  'text/javascript, application/javascript, application/ecmascript, application/x-ecmascript',
              },
              contents: { script: /\b(?:java|ecma)script\b/ },
              converters: {
                'text script': function (e) {
                  return T.globalEval(e), e
                },
              },
            }),
            T.ajaxPrefilter('script', function (e) {
              void 0 === e.cache && (e.cache = !1),
                e.crossDomain && (e.type = 'GET')
            }),
            T.ajaxTransport('script', function (e) {
              var t, n
              if (e.crossDomain || e.scriptAttrs)
                return {
                  send: function (i, r) {
                    ;(t = T('<script>')
                      .attr(e.scriptAttrs || {})
                      .prop({ charset: e.scriptCharset, src: e.url })
                      .on(
                        'load error',
                        (n = function (e) {
                          t.remove(),
                            (n = null),
                            e && r('error' === e.type ? 404 : 200, e.type)
                        }),
                      )),
                      b.head.appendChild(t[0])
                  },
                  abort: function () {
                    n && n()
                  },
                }
            })
          var Vt,
            Xt = [],
            Yt = /(=)\?(?=&|$)|\?\?/
          T.ajaxSetup({
            jsonp: 'callback',
            jsonpCallback: function () {
              var e = Xt.pop() || T.expando + '_' + Tt.guid++
              return (this[e] = !0), e
            },
          }),
            T.ajaxPrefilter('json jsonp', function (e, t, n) {
              var r,
                o,
                s,
                a =
                  !1 !== e.jsonp &&
                  (Yt.test(e.url)
                    ? 'url'
                    : 'string' == typeof e.data &&
                      0 ===
                        (e.contentType || '').indexOf(
                          'application/x-www-form-urlencoded',
                        ) &&
                      Yt.test(e.data) &&
                      'data')
              if (a || 'jsonp' === e.dataTypes[0])
                return (
                  (r = e.jsonpCallback = v(e.jsonpCallback)
                    ? e.jsonpCallback()
                    : e.jsonpCallback),
                  a
                    ? (e[a] = e[a].replace(Yt, '$1' + r))
                    : !1 !== e.jsonp &&
                      (e.url +=
                        (Ct.test(e.url) ? '&' : '?') + e.jsonp + '=' + r),
                  (e.converters['script json'] = function () {
                    return s || T.error(r + ' was not called'), s[0]
                  }),
                  (e.dataTypes[0] = 'json'),
                  (o = i[r]),
                  (i[r] = function () {
                    s = arguments
                  }),
                  n.always(function () {
                    void 0 === o ? T(i).removeProp(r) : (i[r] = o),
                      e[r] && ((e.jsonpCallback = t.jsonpCallback), Xt.push(r)),
                      s && v(o) && o(s[0]),
                      (s = o = void 0)
                  }),
                  'script'
                )
            }),
            (m.createHTMLDocument =
              (((Vt = b.implementation.createHTMLDocument('').body).innerHTML =
                '<form></form><form></form>'),
              2 === Vt.childNodes.length)),
            (T.parseHTML = function (e, t, n) {
              return 'string' != typeof e
                ? []
                : ('boolean' == typeof t && ((n = t), (t = !1)),
                  t ||
                    (m.createHTMLDocument
                      ? (((i = (t = b.implementation.createHTMLDocument(
                          '',
                        )).createElement('base')).href = b.location.href),
                        t.head.appendChild(i))
                      : (t = b)),
                  (o = !n && []),
                  (r = N.exec(e))
                    ? [t.createElement(r[1])]
                    : ((r = Ee([e], t, o)),
                      o && o.length && T(o).remove(),
                      T.merge([], r.childNodes)))
              var i, r, o
            }),
            (T.fn.load = function (e, t, n) {
              var i,
                r,
                o,
                s = this,
                a = e.indexOf(' ')
              return (
                a > -1 && ((i = vt(e.slice(a))), (e = e.slice(0, a))),
                v(t)
                  ? ((n = t), (t = void 0))
                  : t && 'object' == typeof t && (r = 'POST'),
                s.length > 0 &&
                  T.ajax({
                    url: e,
                    type: r || 'GET',
                    dataType: 'html',
                    data: t,
                  })
                    .done(function (e) {
                      ;(o = arguments),
                        s.html(
                          i ? T('<div>').append(T.parseHTML(e)).find(i) : e,
                        )
                    })
                    .always(
                      n &&
                        function (e, t) {
                          s.each(function () {
                            n.apply(this, o || [e.responseText, t, e])
                          })
                        },
                    ),
                this
              )
            }),
            (T.expr.pseudos.animated = function (e) {
              return T.grep(T.timers, function (t) {
                return e === t.elem
              }).length
            }),
            (T.offset = {
              setOffset: function (e, t, n) {
                var i,
                  r,
                  o,
                  s,
                  a,
                  l,
                  c = T.css(e, 'position'),
                  u = T(e),
                  d = {}
                'static' === c && (e.style.position = 'relative'),
                  (a = u.offset()),
                  (o = T.css(e, 'top')),
                  (l = T.css(e, 'left')),
                  ('absolute' === c || 'fixed' === c) &&
                  (o + l).indexOf('auto') > -1
                    ? ((s = (i = u.position()).top), (r = i.left))
                    : ((s = parseFloat(o) || 0), (r = parseFloat(l) || 0)),
                  v(t) && (t = t.call(e, n, T.extend({}, a))),
                  null != t.top && (d.top = t.top - a.top + s),
                  null != t.left && (d.left = t.left - a.left + r),
                  'using' in t ? t.using.call(e, d) : u.css(d)
              },
            }),
            T.fn.extend({
              offset: function (e) {
                if (arguments.length)
                  return void 0 === e
                    ? this
                    : this.each(function (t) {
                        T.offset.setOffset(this, e, t)
                      })
                var t,
                  n,
                  i = this[0]
                return i
                  ? i.getClientRects().length
                    ? ((t = i.getBoundingClientRect()),
                      (n = i.ownerDocument.defaultView),
                      {
                        top: t.top + n.pageYOffset,
                        left: t.left + n.pageXOffset,
                      })
                    : { top: 0, left: 0 }
                  : void 0
              },
              position: function () {
                if (this[0]) {
                  var e,
                    t,
                    n,
                    i = this[0],
                    r = { top: 0, left: 0 }
                  if ('fixed' === T.css(i, 'position'))
                    t = i.getBoundingClientRect()
                  else {
                    for (
                      t = this.offset(),
                        n = i.ownerDocument,
                        e = i.offsetParent || n.documentElement;
                      e &&
                      (e === n.body || e === n.documentElement) &&
                      'static' === T.css(e, 'position');

                    )
                      e = e.parentNode
                    e &&
                      e !== i &&
                      1 === e.nodeType &&
                      (((r = T(e).offset()).top += T.css(
                        e,
                        'borderTopWidth',
                        !0,
                      )),
                      (r.left += T.css(e, 'borderLeftWidth', !0)))
                  }
                  return {
                    top: t.top - r.top - T.css(i, 'marginTop', !0),
                    left: t.left - r.left - T.css(i, 'marginLeft', !0),
                  }
                }
              },
              offsetParent: function () {
                return this.map(function () {
                  for (
                    var e = this.offsetParent;
                    e && 'static' === T.css(e, 'position');

                  )
                    e = e.offsetParent
                  return e || se
                })
              },
            }),
            T.each(
              { scrollLeft: 'pageXOffset', scrollTop: 'pageYOffset' },
              function (e, t) {
                var n = 'pageYOffset' === t
                T.fn[e] = function (i) {
                  return U(
                    this,
                    function (e, i, r) {
                      var o
                      if (
                        (y(e)
                          ? (o = e)
                          : 9 === e.nodeType && (o = e.defaultView),
                        void 0 === r)
                      )
                        return o ? o[t] : e[i]
                      o
                        ? o.scrollTo(
                            n ? o.pageXOffset : r,
                            n ? r : o.pageYOffset,
                          )
                        : (e[i] = r)
                    },
                    e,
                    i,
                    arguments.length,
                  )
                }
              },
            ),
            T.each(['top', 'left'], function (e, t) {
              T.cssHooks[t] = Ue(m.pixelPosition, function (e, n) {
                if (n)
                  return (
                    (n = ze(e, t)), Re.test(n) ? T(e).position()[t] + 'px' : n
                  )
              })
            }),
            T.each({ Height: 'height', Width: 'width' }, function (e, t) {
              T.each(
                { padding: 'inner' + e, content: t, '': 'outer' + e },
                function (n, i) {
                  T.fn[i] = function (r, o) {
                    var s = arguments.length && (n || 'boolean' != typeof r),
                      a = n || (!0 === r || !0 === o ? 'margin' : 'border')
                    return U(
                      this,
                      function (t, n, r) {
                        var o
                        return y(t)
                          ? 0 === i.indexOf('outer')
                            ? t['inner' + e]
                            : t.document.documentElement['client' + e]
                          : 9 === t.nodeType
                          ? ((o = t.documentElement),
                            Math.max(
                              t.body['scroll' + e],
                              o['scroll' + e],
                              t.body['offset' + e],
                              o['offset' + e],
                              o['client' + e],
                            ))
                          : void 0 === r
                          ? T.css(t, n, a)
                          : T.style(t, n, r, a)
                      },
                      t,
                      s ? r : void 0,
                      s,
                    )
                  }
                },
              )
            }),
            T.each(
              [
                'ajaxStart',
                'ajaxStop',
                'ajaxComplete',
                'ajaxError',
                'ajaxSuccess',
                'ajaxSend',
              ],
              function (e, t) {
                T.fn[t] = function (e) {
                  return this.on(t, e)
                }
              },
            ),
            T.fn.extend({
              bind: function (e, t, n) {
                return this.on(e, null, t, n)
              },
              unbind: function (e, t) {
                return this.off(e, null, t)
              },
              delegate: function (e, t, n, i) {
                return this.on(t, e, n, i)
              },
              undelegate: function (e, t, n) {
                return 1 === arguments.length
                  ? this.off(e, '**')
                  : this.off(t, e || '**', n)
              },
              hover: function (e, t) {
                return this.mouseenter(e).mouseleave(t || e)
              },
            }),
            T.each(
              'blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu'.split(
                ' ',
              ),
              function (e, t) {
                T.fn[t] = function (e, n) {
                  return arguments.length > 0
                    ? this.on(t, null, e, n)
                    : this.trigger(t)
                }
              },
            )
          var Kt = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g
          ;(T.proxy = function (e, t) {
            var n, i, r
            if (('string' == typeof t && ((n = e[t]), (t = e), (e = n)), v(e)))
              return (
                (i = a.call(arguments, 2)),
                (r = function () {
                  return e.apply(t || this, i.concat(a.call(arguments)))
                }),
                (r.guid = e.guid = e.guid || T.guid++),
                r
              )
          }),
            (T.holdReady = function (e) {
              e ? T.readyWait++ : T.ready(!0)
            }),
            (T.isArray = Array.isArray),
            (T.parseJSON = JSON.parse),
            (T.nodeName = D),
            (T.isFunction = v),
            (T.isWindow = y),
            (T.camelCase = K),
            (T.type = x),
            (T.now = Date.now),
            (T.isNumeric = function (e) {
              var t = T.type(e)
              return (
                ('number' === t || 'string' === t) && !isNaN(e - parseFloat(e))
              )
            }),
            (T.trim = function (e) {
              return null == e ? '' : (e + '').replace(Kt, '')
            }),
            void 0 ===
              (n = function () {
                return T
              }.apply(t, [])) || (e.exports = n)
          var Qt = i.jQuery,
            Jt = i.$
          return (
            (T.noConflict = function (e) {
              return (
                i.$ === T && (i.$ = Jt),
                e && i.jQuery === T && (i.jQuery = Qt),
                T
              )
            }),
            void 0 === r && (i.jQuery = i.$ = T),
            T
          )
        })
      },
    },
    t = {}
  function n(i) {
    var r = t[i]
    if (void 0 !== r) return r.exports
    var o = (t[i] = { exports: {} })
    return e[i].call(o.exports, o, o.exports, n), o.exports
  }
  ;(n.d = (e, t) => {
    for (var i in t)
      n.o(t, i) &&
        !n.o(e, i) &&
        Object.defineProperty(e, i, { enumerable: !0, get: t[i] })
  }),
    (n.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
    (n.r = (e) => {
      'undefined' != typeof Symbol &&
        Symbol.toStringTag &&
        Object.defineProperty(e, Symbol.toStringTag, { value: 'Module' }),
        Object.defineProperty(e, '__esModule', { value: !0 })
    }),
    (() => {
      'use strict'
      function e(e, t) {
        for (var n = 0; n < t.length; n++) {
          var i = t[n]
          ;(i.enumerable = i.enumerable || !1),
            (i.configurable = !0),
            'value' in i && (i.writable = !0),
            Object.defineProperty(e, i.key, i)
        }
      }
      var t = (function () {
        function t() {
          !(function (e, t) {
            if (!(e instanceof t))
              throw new TypeError('Cannot call a class as a function')
          })(this, t)
        }
        var n, i
        return (
          (n = t),
          (i = [
            {
              key: 'init',
              value: function () {
                $(document).on('change', '#address_id', function (e) {
                  'new' !== $(e.currentTarget).val()
                    ? ($('.address-item-selected')
                        .show()
                        .html(
                          $(
                            '.list-available-address .address-item-wrapper[data-id=' +
                              $(e.currentTarget).val() +
                              ']',
                          ).html(),
                        ),
                      $('.address-form-wrapper').hide())
                    : ($('.address-item-selected').hide(),
                      $('.address-form-wrapper').show())
                }),
                  $(document).on('click', '#create_account', function (e) {
                    $(e.currentTarget).is(':checked')
                      ? $('.password-group').fadeIn()
                      : $('.password-group').fadeOut()
                  })
              },
            },
          ]) && e(n.prototype, i),
          Object.defineProperty(n, 'prototype', { writable: !1 }),
          t
        )
      })()
      function i(e, t) {
        for (var n = 0; n < t.length; n++) {
          var i = t[n]
          ;(i.enumerable = i.enumerable || !1),
            (i.configurable = !0),
            'value' in i && (i.writable = !0),
            Object.defineProperty(e, i.key, i)
        }
      }
      var r = (function () {
        function e() {
          !(function (e, t) {
            if (!(e instanceof t))
              throw new TypeError('Cannot call a class as a function')
          })(this, e)
        }
        var t, n
        return (
          (t = e),
          (n = [
            {
              key: 'init',
              value: function () {
                $(document).on('click', '.btn-open-coupon-form', function (e) {
                  e.preventDefault(),
                    $(document).find('.coupon-wrapper').toggle()
                }),
                  $('.coupon-wrapper .coupon-code').keypress(function (e) {
                    if (13 === e.keyCode)
                      return (
                        $('.apply-coupon-code').trigger('click'),
                        e.preventDefault(),
                        e.stopPropagation(),
                        !1
                      )
                  })
                var e = '#main-checkout-product-info'
                $(document).on('click', '.apply-coupon-code', function (t) {
                  t.preventDefault()
                  var n = $(t.currentTarget)
                  n.find('i').remove(),
                    n.html('<i class="fa fa-spin fa-spinner"></i> ' + n.html()),
                    $.ajax({
                      url: n.data('url'),
                      type: 'POST',
                      data: {
                        coupon_code: n
                          .closest('.coupon-wrapper')
                          .find('.coupon-code')
                          .val(),
                        token: $('#checkout-token').val(),
                      },
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                          'content',
                        ),
                      },
                      success: function (t) {
                        t.error
                          ? ($('.coupon-error-msg .text-danger').text(
                              t.message,
                            ),
                            n.find('i').remove())
                          : $(e).load(
                              window.location.href +
                                '?applied_coupon=1 ' +
                                e +
                                ' > *',
                              function () {
                                n.find('i').remove()
                              },
                            )
                      },
                      error: function (e) {
                        void 0 !== e.responseJSON
                          ? 'undefined' !== e.responseJSON.errors
                            ? $.each(e.responseJSON.errors, function (e, t) {
                                $.each(t, function (e, t) {
                                  $('.coupon-error-msg .text-danger').text(t)
                                })
                              })
                            : void 0 !== e.responseJSON.message &&
                              $('.coupon-error-msg .text-danger').text(
                                e.responseJSON.message,
                              )
                          : $('.coupon-error-msg .text-danger').text(
                              e.status.text,
                            ),
                          n.find('i').remove()
                      },
                    })
                }),
                  $(document).on('click', '.remove-coupon-code', function (t) {
                    t.preventDefault()
                    var n = $(t.currentTarget)
                    n.find('i').remove(),
                      n.html(
                        '<i class="fa fa-spin fa-spinner"></i> ' + n.html(),
                      ),
                      $.ajax({
                        url: n.data('url'),
                        type: 'POST',
                        data: { token: $('#checkout-token').val() },
                        headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content',
                          ),
                        },
                        success: function (t) {
                          t.error
                            ? ($('.coupon-error-msg .text-danger').text(
                                t.message,
                              ),
                              n.find('i').remove())
                            : $(e).load(
                                window.location.href + ' ' + e + ' > *',
                                function () {
                                  n.find('i').remove()
                                },
                              )
                        },
                        error: function (e) {
                          void 0 !== e.responseJSON
                            ? 'undefined' !== e.responseJSON.errors
                              ? $.each(e.responseJSON.errors, function (e, t) {
                                  $.each(t, function (e, t) {
                                    $('.coupon-error-msg .text-danger').text(t)
                                  })
                                })
                              : void 0 !== e.responseJSON.message &&
                                $('.coupon-error-msg .text-danger').text(
                                  e.responseJSON.message,
                                )
                            : $('.coupon-error-msg .text-danger').text(
                                e.status.text,
                              ),
                            n.find('i').remove()
                        },
                      })
                  })
              },
            },
          ]) && i(t.prototype, n),
          Object.defineProperty(t, 'prototype', { writable: !1 }),
          e
        )
      })()
      function o(e, t) {
        for (var n = 0; n < t.length; n++) {
          var i = t[n]
          ;(i.enumerable = i.enumerable || !1),
            (i.configurable = !0),
            'value' in i && (i.writable = !0),
            Object.defineProperty(e, i.key, i)
        }
      }
      try {
        ;(window.$ = window.jQuery = n(9755)), n(7244)
      } catch (e) {}
      var s = (function () {
        function e() {
          !(function (e, t) {
            if (!(e instanceof t))
              throw new TypeError('Cannot call a class as a function')
          })(this, e),
            new t().init(),
            new r().init()
        }
        var n, i, s
        return (
          (n = e),
          (s = [
            {
              key: 'showNotice',
              value: function (e, t) {
                var n =
                  arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : ''
                if (
                  (toastr.clear(),
                  (toastr.options = {
                    closeButton: !0,
                    positionClass: 'toast-bottom-right',
                    onclick: null,
                    showDuration: 1e3,
                    hideDuration: 1e3,
                    timeOut: 1e4,
                    extendedTimeOut: 1e3,
                    showEasing: 'swing',
                    hideEasing: 'linear',
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                  }),
                  !n)
                )
                  switch (e) {
                    case 'error':
                      n = window.messages.error_header
                      break
                    case 'success':
                      n = window.messages.success_header
                  }
                toastr[e](t, n)
              },
            },
          ]),
          (i = [
            {
              key: 'init',
              value: function () {
                var e = '#main-checkout-product-info',
                  t = function () {
                    $('.payment-info-loading').show(),
                      $('.payment-checkout-btn').prop('disabled', !0)
                  },
                  n = function () {
                    $('.payment-info-loading').hide(),
                      $('.payment-checkout-btn').prop('disabled', !1),
                      document.dispatchEvent(
                        new CustomEvent('payment-form-reloaded'),
                      )
                  }
                !(function () {
                  var i = $(document)
                    .find('input[name=shipping_method]:checked')
                    .first()
                  if (
                    (i.length ||
                      (i = $(document)
                        .find('input[name=shipping_method]')
                        .first()),
                    i.length)
                  ) {
                    i.trigger('click'), t(), $('.mobile-total').text('...')
                    var r = $(
                        '.customer-address-payment-form #address_id option:selected',
                      ).val(),
                      o = $('.customer-address-payment-form').clone(),
                      s = $(
                        '.customer-address-payment-form #address_country option:selected',
                      ).val(),
                      a = $(
                        '.customer-address-payment-form #address_state option:selected',
                      ).val(),
                      l = $(
                        '.customer-address-payment-form #address_city option:selected',
                      ).val()
                    $('.shipping-info-loading').show(),
                      $(e).load(
                        window.location.href +
                          '?shipping_method=' +
                          i.val() +
                          '&shipping_option=' +
                          i.data('option') +
                          ' ' +
                          e +
                          ' > *',
                        function () {
                          r ||
                            ($('.customer-address-payment-form').replaceWith(o),
                            s &&
                              $(
                                '.customer-address-payment-form #address_country',
                              ).val(s),
                            a &&
                              $(
                                '.customer-address-payment-form #address_state',
                              ).val(a),
                            l &&
                              $(
                                '.customer-address-payment-form #address_city',
                              ).val(l)),
                            $('.shipping-info-loading').hide(),
                            n()
                        },
                      )
                  }
                })()
                var i = function () {
                  var i = $('.checkout-products-marketplace')
                  if (i && i.length) {
                    var r = $(e).find('input.shipping_method_input'),
                      o = { shipping_method: {}, shipping_option: {} }
                    if (r.length) {
                      var s = []
                      r.map(function (e, t) {
                        var n = $(t).filter(':checked').val(),
                          i = $(t).data('id')
                        s.includes(i) || s.push(i),
                          n &&
                            ((o.shipping_method[i] = n),
                            (o.shipping_option[i] = $(t).data('option')))
                      }),
                        Object.keys(o.shipping_method).length !== s.length &&
                          r.map(function (e, t) {
                            var n = $(t).data('id')
                            o.shipping_method[n] ||
                              ((o.shipping_method[n] = $(t).val()),
                              (o.shipping_option[n] = $(t).data('option')),
                              $(t).prop('checked', !0))
                          })
                    }
                    t()
                    var a = $(
                        '.customer-address-payment-form #address_id option:selected',
                      ).val(),
                      l = $('.customer-address-payment-form').clone(),
                      c = $(
                        '.customer-address-payment-form #address_country option:selected',
                      ).val(),
                      u = $(
                        '.customer-address-payment-form #address_state option:selected',
                      ).val(),
                      d = $(
                        '.customer-address-payment-form #address_city option:selected',
                      ).val()
                    $('.shipping-info-loading').show(),
                      $(e).load(
                        window.location.href +
                          '?' +
                          $.param(o) +
                          ' ' +
                          e +
                          ' > *',
                        function () {
                          a ||
                            ($('.customer-address-payment-form').replaceWith(l),
                            c &&
                              $(
                                '.customer-address-payment-form #address_country',
                              ).val(c),
                            u &&
                              $(
                                '.customer-address-payment-form #address_state',
                              ).val(u),
                            d &&
                              $(
                                '.customer-address-payment-form #address_city',
                              ).val(d)),
                            $('.shipping-info-loading').hide(),
                            n()
                        },
                      )
                  }
                }
                i(),
                  $(document).on(
                    'change',
                    'input.shipping_method_input',
                    function () {
                      i()
                    },
                  ),
                  $(document).on(
                    'change',
                    'input[name=shipping_method]',
                    function (i) {
                      var r = $(i.currentTarget)
                      $('input[name=shipping_option]').val(r.data('option')),
                        t(),
                        $('.mobile-total').text('...')
                      var o = $(
                          '.customer-address-payment-form #address_id option:selected',
                        ).val(),
                        s = $('.customer-address-payment-form').clone(),
                        a = $(
                          '.customer-address-payment-form #address_country option:selected',
                        ).val(),
                        l = $(
                          '.customer-address-payment-form #address_state option:selected',
                        ).val(),
                        c = $(
                          '.customer-address-payment-form #address_city option:selected',
                        ).val()
                      $('.shipping-info-loading').show(),
                        $(e).load(
                          window.location.href +
                            '?shipping_method=' +
                            r.val() +
                            '&shipping_option=' +
                            r.data('option') +
                            ' ' +
                            e +
                            ' > *',
                          function () {
                            o ||
                              ($('.customer-address-payment-form').replaceWith(
                                s,
                              ),
                              a &&
                                $(
                                  '.customer-address-payment-form #address_country',
                                ).val(a),
                              l &&
                                $(
                                  '.customer-address-payment-form #address_state',
                                ).val(l),
                              c &&
                                $(
                                  '.customer-address-payment-form #address_city',
                                ).val(c)),
                              $('.shipping-info-loading').hide(),
                              n()
                          },
                        )
                    },
                  ),
                  $(document).on(
                    'change',
                    '.customer-address-payment-form .address-control-item',
                    function (r) {
                      var o = $(r.currentTarget)
                      o.closest('.form-group').find('.text-danger').remove(),
                        (function () {
                          var e = $('#address_id').val()
                          if (e && 'new' !== e) return !0
                          var t = !0
                          return (
                            $.each(
                              $(document).find(
                                '.address-control-item-required',
                              ),
                              function (e, n) {
                                ;($(n).val() && 'null' !== $(n).val()) ||
                                  (t = !1)
                              },
                            ),
                            t
                          )
                        })() &&
                          $.ajax({
                            type: 'POST',
                            cache: !1,
                            url: $('#save-shipping-information-url').val(),
                            data: new FormData(o.closest('form')[0]),
                            contentType: !1,
                            processData: !1,
                            success: function (r) {
                              if (!r.error) {
                                t()
                                var o = $(e)
                                o.length &&
                                  ($('.shipping-info-loading').show(),
                                  o.load(
                                    window.location.href + ' ' + e + ' > *',
                                    function () {
                                      $('.shipping-info-loading').hide(),
                                        o.find(
                                          'input[name=shipping_method]:checked',
                                        ) ||
                                          o
                                            .find(
                                              'input[name=shipping_method]:first-child',
                                            )
                                            .trigger('click'),
                                        n()
                                    },
                                  )),
                                  i()
                              }
                            },
                            error: function (e) {
                              console.log(e)
                            },
                          })
                    },
                  )
              },
            },
          ]) && o(n.prototype, i),
          s && o(n, s),
          Object.defineProperty(n, 'prototype', { writable: !1 }),
          e
        )
      })()
      $(document).ready(function () {
        new s().init(), (window.MainCheckout = s)
      })
    })()
})()
