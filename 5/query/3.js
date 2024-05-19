db.getCollection('sales').aggregate(
    [
      {
        $lookup: {
          from: 'products',
          localField: 'K_PP',
          foreignField: 'K_PP',
          as: 'product_info'
        }
      },
      { $unwind: '$product_info' },
      {
        $group: {
          _id: {
            'Найменування торговельної марки':
              '$product_info.FIRM.name',
            'Найменування типу товару':
              '$product_info.PRODUCT.name'
          },
          Sales: { $sum: '$KIL' },
          'Ціна реалізації': {
            $avg: '$product_info.C_YO'
          },
          'Дати реалізації': { $push: '$D_REAL' }
        }
      },
      { $sort: { Sales: -1 } },
      { $limit: 5 },
      {
        $addFields: {
          'Дата реалізації': {
            $arrayElemAt: ['$Дати реалізації', 0]
          }
        }
      },
      {
        $project: {
          _id: 0,
          'Найменування торговельної марки':
            '$_id.Найменування торговельної марки',
          'Найменування типу товару':
            '$_id.Найменування типу товару',
          'Ціна реалізації': 1,
          Sales: 1,
          'Дата реалізації': 1
        }
      }
    ],
    { maxTimeMS: 60000, allowDiskUse: true }
  );