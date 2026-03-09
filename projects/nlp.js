// nlp.plugin(nlpPlugin.pack({
//   tags: {
//     England: {
//       isA: "Place"
//     },
//     Scotland: {
//       isA: "Place"
//     },
//   },
//   words: {
//     bedfordshire: 'England',
//     aberdeenshire: 'Scotland',
//     buckinghamshire: 'England',
//     argyllshire: 'Scotland',
//     bambridgeshire: 'England',
//     cheshire: 'England',
//     ayrshire: 'Scotland',
//     banffshire: 'Scotland'
//   },
//   "plurals": {
//     "apricot": "apricots",
//     "banana": "bananas",
//     "loaf": "loaves",
//     "tooth": "teeth",
//     "fruit": "fruit"
//   }
// }))


nlp("undid").tag("PastTense")
nlp("undoes").tag("PresentTense")